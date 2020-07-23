<?php

namespace App\Exports;

use const App\Http\Controllers\controlpanelcontrollers\TRAINING_PAGINATION;
use App\Training;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class TrainingExport implements FromCollection
{
    public $city;
    public function __construct($city) {
        $this->city = $city;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $training= DB::table('training')
            ->where('training.type','=','G')
            ->join('users', 'training.studentId', '=', 'users.id')
            ->join('enterprises', 'training.enterpriseId', '=', 'enterprises.id')
            ->join('address', 'address.id', '=', 'enterprises.addressId')
            ->join('students','students.userId','=','training.studentId')
            ->where('address.city','=',$this->city)
            ->select( 'users.name as studentName','training.sector','enterprises.name','address.city','address.street')
            ->get();

        foreach ($training as $tr){
            if($tr->city=="Gaza"){
                $tr->city="غزة";
            }elseif ($tr->city=="middle"){
                $tr->city="الوسطى";

            }elseif ($tr->city=="Rafah"){
                $tr->city="رفح";

            }elseif ($tr->city=="khan Yonis"){
                $tr->city="خانيونس";

            }elseif ($tr->city=="north"){
                $tr->city="الشمال";
            }
        }

        return $training;
    }
}
