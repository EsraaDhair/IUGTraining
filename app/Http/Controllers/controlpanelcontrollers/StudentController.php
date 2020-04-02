<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.userId')
            ->select('users.*', 'students.*')
            ->get();
        return view('base_layout.students.studentsList',['students'=>$students]);

    }
}
