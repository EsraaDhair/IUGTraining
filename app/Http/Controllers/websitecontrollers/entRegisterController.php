<?php

namespace App\Http\Controllers\websitecontrollers;

use App\Address;
use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Role;
use App\Supervisor;
use App\TrainingSector;
use App\User;
use App\WorkTime;
use Illuminate\Http\Request;
use App\Traits\ImgaeUpload;
use Illuminate\Support\Facades\DB;


class entRegisterController extends Controller
{

    use ImgaeUpload;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.registration.entRegister');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validation = $request->validate($this->rules(), $this->messages());
        if ($validation) {
            $address = new Address();
            $address->city = $request->city;
            $address->street = $request->street;
            $address->save();
            $enterprise = new Enterprise();
            $enterprise->name = $request->entName;
            if ($request->has('logo')) {
                $request->logo=$this->UserImageUpload($request['logo'],'enterprises');
            }
            $enterprise->email = $request->email;
            $enterprise->logo = $request->logo;
            $enterprise->mobile = $request->mobile;
            $enterprise->addressId = $address->id;
            $enterprise->save();
            foreach ($request->chkBox as $chkBox) {
                $training_sector = new TrainingSector();
                $numOfMales=$chkBox.',numOfMales';
//                dd($request->$numOfMales);
                $numOfFeMales=$chkBox.',numOfFeMales';
                $training_sector->title = $chkBox;
                $training_sector->femaleStudentsNO = $request->$numOfFeMales;
                $training_sector->maleStudentsNO = $request->$numOfMales;
                $training_sector->enterpriseId = $enterprise->id;
                $training_sector->save();
                $work_time=new WorkTime();
                $saturday=$chkBox.',saturday';
                $sunday=$chkBox.',sunday';
                $monday=$chkBox.',monday';
                $tuesday=$chkBox.',tuesday';
                $wednesday=$chkBox.',wednesday';
                $thursday=$chkBox.',thursday';
                if ($request->has($saturday)) {
                    $work_time->saturday = 1;
                } if ($request->has($sunday)) {
                    $work_time->sunday = 1;
                }  if ($request->has($monday)) {
                    $work_time->monday = 1;
                } if ($request->has($tuesday)) {
                    $work_time->tuesday = 1;
                } if ($request->has($wednesday)) {
                    $work_time->wednesday = 1;
                } if ($request->has($thursday)) {
                    $work_time->thursday = 1;
                }
                $from=$chkBox.'from';
                $to=$chkBox.'to';
                $work_time->startTime = date("H:i:s A", strtotime($request->$from));;
                $work_time->endTime = date("H:i:s A", strtotime($request->$to));
                $training_sector = DB::table('training_sectors')->where('title', $chkBox)->first();
                $work_time->training_sectorId = $training_sector->id;
                $work_time->save();
            }
            $user = new User();
            $user->name = $request->supName;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();
            $role=new Role();
            $role->userId=$user->id;
            $role->type='supervisor';
            $role->save();
            $supervisor = new Supervisor();
            $supervisor->jobTitle = $request->jobTitle;
            $supervisor->userId = $user->id;
            $supervisor->enterpriseId = $enterprise->id;
            $supervisor->save();
            return redirect()->back()->with('success', 'تم تسجيل بياناتك بنجاح!');
        }
        return redirect()->back()->with('error', 'هناك خطأ في بياناتك!');
    }

    private function rules(){
        return[
            'entName'=>'required',
            'city'=>'required',
            'email'=>'required|email|unique:enterprises,email',
            'mobile'=>'required|unique:enterprises,mobile|max:10',
            'street'=>'required',
            'supName'=>'required',
            'jobTitle'=>'required',
            'logo'=>'required'
        ];
    }
    private function messages(){
        return[
            'entName.required'=>'يجب إدخال اسم الشركة',
            'city.required'=>'يجب إدخال المدينة المتواجدة فيها الشركة',
            'email.required'=>'يجب إدخال الايميل',
            'email.unique'=>'تم إدخال هذا الايميل مسبقاً',
            'mobile.required'=>'يجب إدخال رقم الجوال',
            'mobile.unique'=>'تم إدخال هذا الرقم مسبقاً',
            'mobile.max'=>'يجب إدخال عشرة ارقام فقط',
            'street.required'=>'يجب إدخال الشارع',
            'supName.required'=>'يجب ادخال اسم المشرف',
            'jobTitle.required'=>'يجب ادخال تخصص المشرف',
            'logo.required'=>'يجب ادراج صورة الشعار',
        ];
    }


}
