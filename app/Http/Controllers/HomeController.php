<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function home(){
        $sliders=Slider::all()->where('active','=',1);
        $enterprises=DB::table('enterprises')->select('enterprises.*')->get();
        return view('website.home',['sliders'=>$sliders , 'enterprises'=>$enterprises]);
    }
}
