<?php

namespace App\Http\Controllers\websitecontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    public function viewData(){
        $student = DB::table('Training')->get();
//        dd($student->type);
//        if ($student->type == 'G'){
//            return view('website.student.general');
//        }
    }
}
