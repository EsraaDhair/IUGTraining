<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnterpriseController extends Controller
{
    public function index(){
        $enterprises=DB::table('enterprises')
            ->join('address','enterprises.addressId','=','address.id')
            ->join('supervisors', 'enterprises.id', '=', 'supervisors.enterpriseId')
            ->join('users', 'supervisors.userId', '=', 'users.id')
            ->select('enterprises.*','address.city','users.name as supervisor')
            ->get();
        foreach ($enterprises as $en){
            $en->sectors= $this->getEnterpriseSectors($en->id);
        }
        return view('base_layout.enterprises.enterprises',['enterprises'=>$enterprises]);

    }
    private function getEnterpriseSectors($id){
        $sectors=[];
        $i=0;
        $enterpriseSectors=DB::table('enterprises')
            ->join('training_sectors', 'enterprises.id', '=', 'training_sectors.enterpriseId')
            ->where([['enterprises.id','=',$id]
            ])
            ->select('training_sectors.*')
            ->get();
        foreach ($enterpriseSectors as $se){
            $sectors[$i++]=$se->title;
        }
        return $sectors;
    }
}
