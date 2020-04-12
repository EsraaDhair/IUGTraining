<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
const TRAINING_PAGINATION = 10;

class TrainingController extends Controller
{
    public function getSpecialTrainingStudents(){

    }
    public function getGeneralTrainingStudents(){
        $gTrainings= DB::table('training')
            ->where('training.type','=','G')
            ->join('users', 'training.studentId', '=', 'users.id')
            ->join('students','students.userId','=','training.studentId')
            ->join('choices','training.studentId','=','choices.stdID')
            ->select('training.id', 'users.name','students.stdId','choices.first_choice','choices.second_choice')
            ->paginate(TRAINING_PAGINATION);
        return view('base_layout.training.generalTraining',['gTrainings'=>$gTrainings]);

    }
    public function distributeStudents(){
        return view('base_layout.training.studentsDistribution');

    }


}
