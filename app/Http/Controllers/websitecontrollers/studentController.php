<?php

namespace App\Http\Controllers\websitecontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewData(){
        $student = DB::table('training')
            ->where('studentId','=',Auth::id())
            ->get();
        $enterprise = DB::table('enterprises')
            ->where('enterprises.id','=',$student[0]->enterpriseId)
            ->join('address','enterprises.addressId','=','address.id')
            ->get();
            return view('website.student.general',['student'=>$student,'enterprise'=>$enterprise]);
    }
    public function viewSupervisorData(){
        $enterprise = DB::table('supervisors')
            ->where('supervisors.userId','=',Auth::id())
            ->join('enterprises','enterprises.id','=','supervisors.enterpriseId')
            ->join('address','enterprises.addressId','=','address.id')
            ->get();
        $trainingcount=$student = DB::table('training')
            ->where('enterpriseId','=',$enterprise[0]->id)
            ->count();
            return view('website.entepriseview',['enterprise'=>$enterprise,'trainingcount'=>$trainingcount]);
    }
}
