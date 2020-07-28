<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
       $user = Auth::user();
       dd($user);
       if ($user->name=="admin"){
           return view('base_layout.students.studentsList');
       }

=======
//       $user = Auth::user();
//       if ($user->name == 'admin'){
//           return view('base_layout.students.studentsList');
//       }else{
//           return view('website.home');
//       }
        return view('home');
>>>>>>> 52ee958ba0985ae7a8462a62cc03fc6d9eda1d40
    }
}
