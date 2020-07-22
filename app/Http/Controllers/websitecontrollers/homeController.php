<?php

namespace App\Http\Controllers\websitecontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class homeController extends Controller
{
    public function index(){
        $enterprises=DB::table('enterprises')->select('enterprises.*')->get();
        return view('website.home',['enterprises'=>$enterprises]);
    }
}
