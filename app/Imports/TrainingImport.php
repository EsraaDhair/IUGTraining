<?php

namespace App\Imports;

use App\Address;
use App\Choices;
use App\Role;
use App\Student;
use App\Training;
use App\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Illuminate\Http\Request;

class TrainingImport implements ToModel ,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(!empty($row['name'])) {
            $user = new User();
            $user->name = $row['name'];
            $user->email = $row['email'];
            $user->mobile = $row['phone'];
            $user->save();
            $role = new Role();
            $role->userId = $user->id;
            $role->type = 'student';
            $role->save();
            $address = new Address();
            $address->city = $row['city'];
            $address->street = $row['street'];
            $address->save();
            $student = new Student();
            $student->userId = $user->id;
            $student->addressId = $address->id;
            $student->stdId = $row['id'];
            $student->niche = $row['niche'];
            $student->save();

            $training = "";

            if ($row['type'] == 'S') {
                $id = "TR" . $user->id;
                $training = new Training([
                    'id' => $id,
                    'studentId' => $user->id,
                    'placeOfTraining' => $row['placeoftraining'],
                    'sector' => $row['choice'],
                    'type' => $row['type'],
                ]);
            } elseif ($row['type'] == 'G') {
                $id = "TR" . $user->id;
                $choices = new Choices();
                $choices->first_choice = $row['choice'];
                $choices->stdID = $user->id;
                $choices->save();
//            dd($id);
                $training = new Training([
                    'id' => $id,
                    'studentId' => $user->id,
                    'type' => $row['type'],
                ]);
            }
            return $training;

        }
        return null;

    }
}
