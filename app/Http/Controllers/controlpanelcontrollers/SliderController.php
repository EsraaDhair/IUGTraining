<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create(){
        return view('base_layout.slider.create');
    }
    public function store(){

    }
}
