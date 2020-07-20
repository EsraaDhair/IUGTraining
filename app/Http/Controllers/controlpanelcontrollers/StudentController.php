<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use App\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
const STUDENT_PAGINATION = 10;

class StudentController extends Controller
{
    public function index(){
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.userId')
            ->select('users.*', 'students.*')
            ->paginate(STUDENT_PAGINATION);
        foreach ($students as $student){
            if($student->niche=='SD'){
                $student->niche="تطوير برمجيات";
            }else if($student->niche=='MM'){
                $student->niche="الوسائط المتعددة و تطوير الويب";
            }else if($student->niche=='CS'){
                $student->niche="علوم الحاسوب";
            }else if($student->niche=='IS'){
                $student->niche="نظم تكنولوجيا المعلومات";
            }else if($student->niche=='MO'){
                $student->niche="الحوسبة المتنقلة و و تطبيقات الأجهزة الذكية";
            }
        }
        return view('base_layout.students.studentsList',['students'=>$students]);
    }

    public function setPasswords(){
        $students = DB::table('users')
            ->join('students', 'users.id', '=', 'students.userId')
            ->select('users.*', 'students.*')->get();
        foreach ($students as $student){
            $password = new Password();
            $password->userId = $student->userId ;
            $stdPassword =str::random(2).substr($student->stdId,-4) . substr($student->mobile,-4);
            $password->password = $stdPassword;
            $password->save();
        }
        return redirect()->back()->with('success', 'تم تعيين كلمات السر بنجاح!');

    }
}
