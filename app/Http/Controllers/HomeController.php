<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $role = DB::table('roles')->where('userId', '=', Auth::id())
            ->select('roles.type')
            ->get();
        if ($role[0]->type == "admin") {
            return redirect(route('admin.home'));
        } else if ($role[0]->type == "supervisor") {
            return  redirect(route('website.viewSupervisorInfo'));
        } else if ($role[0]->type == "student") {
            return redirect(route('website.viewInfo'));
        }
        return null;
    }
}
