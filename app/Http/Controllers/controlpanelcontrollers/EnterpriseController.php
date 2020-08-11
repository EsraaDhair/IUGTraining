<?php

namespace App\Http\Controllers\controlpanelcontrollers;

use App\Http\Controllers\Controller;
use App\Mail\EnterprisePassword;
use App\Mail\NewPassword;
use App\Password;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

const ENTERPRISE_PAGINATION = 10;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EnterpriseController extends Controller
{
    public function index(Request $request){
        $enterprises=DB::table('enterprises')
            ->where([])
            ->join('address','enterprises.addressId','=','address.id')
            ->join('supervisors', 'enterprises.id', '=', 'supervisors.enterpriseId')
            ->join('users', 'supervisors.userId', '=', 'users.id')
            ->select('enterprises.*','address.city','users.name as supervisor');

        if($request->has('name'))
            $enterprises=$enterprises->where('enterprises.name','like','%'.$request->input('name').'%');
        $enterprises=$enterprises->paginate(ENTERPRISE_PAGINATION);

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
    public function setPasswords(){
        $supervisors = DB::table('users')
            ->join('supervisors', 'users.id', '=', 'supervisors.userId')
            ->select('users.*', 'supervisors.*')->get();

        foreach ($supervisors as $supervisor){
            $password= str::random(6);
            Mail::to($supervisor->email)->send(new EnterprisePassword($password));
            sleep(1.1);
            $password=bcrypt($password);
            $affected = DB::table('users')
                ->where('id', '=',$supervisor->id)
                ->update(['password' =>$password ]);
        }
        return redirect()->back()->with('success', 'تم تعيين كلمات السر بنجاح!');

    }
}
