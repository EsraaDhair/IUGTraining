<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Enterprise;
use App\Student;
use App\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $std=Student::all()->count();
        $en=Enterprise::all()->count();
        $str=Training::where('type','=','S')->count();
        $gtr=Training::where('type','=','G')->count();
        return view('base_layout.home',['students'=>$std,'enterprises'=>$en,'str'=>$str,'gtr'=>$gtr]);
    }
}
