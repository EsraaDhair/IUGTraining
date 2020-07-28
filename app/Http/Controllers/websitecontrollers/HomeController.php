<?php

namespace App\Http\Controllers\websitecontrollers;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(){
        $sliders=Slider::all()->where('active','=',1)
        ->sortBy('rank');
        $enterprises=DB::table('enterprises')->select('enterprises.*')->get();
        return view('website.home',['sliders'=>$sliders , 'enterprises'=>$enterprises]);
    }
}
