<?php

namespace App\Http\Controllers\websitecontrollers;

use App\Address;
use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Supervisor;
use App\TrainingSector;
use App\User;
use App\WorkTime;
use Illuminate\Http\Request;
use App\Traits\ImgaeUpload;


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
//        dd($request->logo);
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
//                dd( $request->logo);

//                $image = $request->file('logo');
//                $extention = $image->getClientOriginalExtension();
//                $file_name = str_random(15) . "" . rand(1000000, 9999999) . "" . time() . "_" . rand(1000000, 9999999) . "." . $extention;
//                Image::make($image)->resize(800, null, function ($constraint) {
//                    $constraint->aspectRatio();
//                })->save("uploads/images/enterpriseLogo/$file_name");
//                $enterprise->logo = $file_name;
            }

            $enterprise->email = $request->email;
            $enterprise->logo = $request->logo;
            $enterprise->mobile = $request->mobile;
            $enterprise->addressId = $address->id;
            $enterprise->save();
            foreach ($request->chkBox as $chkBox){
                foreach ($request->numOfMales as $males){
                    foreach ($request->numOfFeMales as $females){
                        foreach ($request->days as $day){
                            foreach ($request->from as $from){
                                foreach ($request->to as $to){
                                    $training_sector = new TrainingSector();
                                    $training_sector->title = $chkBox;
                                    $training_sector->maleStudents = $males;
                                    $training_sector->femaleStudents = $females;
                                    $training_sector->enterpriseId = $enterprise->id;
                            $training_sector->save();
                                    $work_time = new WorkTime();
                                    if ($day = 'saturday'){
                                        $work_time->saturday = 1;
                                    }elseif ($day = 'sunday'){
                                        $work_time->sunday = 1;
                                    }
                                    elseif ($day = 'monday'){
                                        $work_time->monday = 1;
                                    }elseif ($day = 'tuesday'){
                                        $work_time->tuesday = 1;
                                    }elseif ($day = 'wednesday'){
                                        $work_time->wednesday = 1;
                                    }elseif ($day = 'thursday'){
                                        $work_time->thursday = 1;
                                    }
                                    $work_time->startTime = $from;
                                    $work_time->endTime = $to;
                                    $work_time->training_sectorId = $training_sector->id;
                                    $work_time->save();
                                }
                            }
                        }
                    }
                }
            }
            $user = new User();
            $user->name = $request->supName;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();
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
