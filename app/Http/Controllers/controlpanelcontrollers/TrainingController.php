<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
const STUDENT_PAGINATION = 10;

class TrainingController extends Controller
{
    public function getSpecialTrainingStudents(){
        $students = DB::table('users')
        ->join('training','users.id','=','training.studentId')
        ->where('type','=','S')
        ->select('users.*','training.*');
        return view('base_layout.training.specialTraining',['students'=>$students]);
    }

    public function getApproved(Request $request){
        $students = DB::table('users')
            ->join('training','users.id','=','training.studentId')
            ->where('type','=','S')
            ->select('users.*','training.*')
           ->get();
        foreach ($students as $student){
            if ($request->has('chkBox')) {
                $student->approved= 1;
                DB::table('users')
                    ->join('training','users.id','=','training.studentId')
                    ->update(['approved' => 1]);
            }
        }
        return view('base_layout.training.specialTraining',['students'=>$students]);
    }

    public function getGeneralTrainingStudents(){

    }
}
