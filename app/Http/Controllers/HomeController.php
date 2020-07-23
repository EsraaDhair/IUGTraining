<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $sliders=Slider::all()->where('active','=',1);
        return view('website/home',['sliders'=>$sliders]);
    }
}
