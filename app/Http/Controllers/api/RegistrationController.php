<?php

namespace App\Http\Controllers\api;

use App\Address;
use App\Choices;
use App\Http\Controllers\Controller;
use App\Role;
use App\Student;
use App\Training;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function registerStudent(Request $request){

        $validation = Validator::make($request->all(),$this->rules(), $this->messages());
        if ($validation->fails()) {
            return parent::errors($validation->errors());
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->phone;
        $user->save();
        $role=new Role();
        $role->userId=$user->id;
        $role->type='student';
        $role->save();
        $address = new Address();
        $address->city = $request->city;
        $address->street = $request->street;
        $address->save();
        $student = new Student();
        $student->userId = $user->id;
        $student->addressId = $address->id;
        $student->stdId = $request->stdID;
        $student->niche = $request->niche;
        $student->save();
        $training = new Training();
        $training->id='TR'.$user->id;
        $training->studentId = $user->id;
        if (!empty($request->placeOfTraining)) {
            $training->placeOfTraining = $request->placeOfTraining;
            $training->sector=$request->choice;
        }
        if($request->type=="general"){
            $training->type='G';
            $choices=new Choices();
            $choices->first_choice = $request->choice;
            $choices->second_choice = $request->choice2;
            $choices->stdID=$user->id;
            $choices->save();
        }else if($request->type=="special"){
            $training->type='S';
        }
        $training->save();
        return parent::success($student);
    }

    public function registerEnterprise(Request $request){

    }


    private function rules(){
        return[
            'name'=>'required',
            'stdID'=>'required|unique:students,stdId',
            'email'=>'required|email|:users,email',
            'phone'=>'required|unique:users,mobile',
            'city'=>'required',
            'niche'=>'required',
            'street'=>'required',
            'type'=>'required',
            'choice'=>'required',
        ];
    }
    private function messages(){
        return[
            'name.required'=>'يجب إدخال الاسم',
            'stdID.required'=>'يجب إدخال الرقم الجامعي',
            'stdID.unique'=>'تم إدخال هذا الرقم مسبقاً',
            'email.required'=>'يجب إدخال الايميل',
            'email.unique'=>'تم إدخال هذا الايميل مسبقاً',
            'phone.required'=>'يجب إدخال رقم الجوال',
            'phone.unique'=>'تم إدخال هذا الرقم مسبقاً',
            'city.required'=>'يجب إدخال المدينة',
            'street.required'=>'يجب إدخال الشارع',
            'choice.required'=>'يجب اختيار مجال التدريب',
            'niche.required'=>'يجب اختيار التخصص',
            'placeOfTraining.optional'=>'أدخل مكان التدريب',
            'type.required'=>'يجب اختيار نوع التدريب',

        ];
    }
}
