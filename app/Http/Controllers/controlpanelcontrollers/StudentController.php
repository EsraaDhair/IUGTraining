<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use App\Mail\NewPassword;
use App\Password;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
const STUDENT_PAGINATION = 10;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = DB::table('users')
            ->where([])
            ->join('students', 'users.id', '=', 'students.userId')
            ->select('users.*', 'students.*');
        if ($request->has('name'))
            $students = $students->where('name', 'like', '%' . $request->input('name') . '%');
        if ($request->has('stdId'))
            $students = $students->where('stdId', 'like', '%' . $request->input('stdId') . '%');
        $students = $students->paginate(STUDENT_PAGINATION);

        foreach ($students as $student) {
            if ($student->niche == 'SD') {
                $student->niche = "تطوير برمجيات";
            } else if ($student->niche == 'MM') {
                $student->niche = "الوسائط المتعددة و تطوير الويب";
            } else if ($student->niche == 'CS') {
                $student->niche = "علوم الحاسوب";
            } else if ($student->niche == 'IS') {
                $student->niche = "نظم تكنولوجيا المعلومات";
            } else if ($student->niche == 'MO') {
                $student->niche = "الحوسبة المتنقلة و تطبيقات الأجهزة الذكية";
            }
        }
        return view('base_layout.students.studentsList', ['students' => $students]);
    }

//
}
