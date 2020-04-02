@extends('website.base_layout')
@section('style')
    <style type="text/css">
        .error{
            color: red;
            text-align: left;
        }
    </style>
    <link rel="stylesheet" href="{{asset('website/css/form_style.css')}}">
@endsection
@section('content')
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="{{asset('website/img/logo.png')}}" alt="logo"/>
                <h3>تسجيل الشركات</h3>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="col-md-9" style="text-align: center;margin:10px auto">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-error">
                                {{session('error')}}
                            </div>
                        @endif
                    </div>
                    <form action="{{route('ent.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="tab-pane fade show active" id="enterprise" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">بيانات الشركة</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="اسم الشركة*" name="entName" value="{{old('entName')}}" />
                                    <span class="error">{{$errors->first('entName')}}</span>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="city">
                                        <option class="hidden"  selected disabled> العنوان ( المدينة ) *</option>
                                        <option value="Rafah" {{ old('city') == "Rafah" ? 'selected' : '' }}>رفح</option>
                                        <option value="Gaza" {{ old('city') =="Gaza" ? 'selected' : '' }}>غزة</option>
                                        <option value="khan Yonis" {{ old('city') == "khan Yonis" ? 'selected' : '' }}>خانيونس</option>
                                        <option value="middle" {{ old('city') == "middle" ? 'selected' : '' }}>الوسطى</option>
                                        <option value="north" {{ old('city') == "north" ? 'selected' : '' }}>الشمال</option>
                                    </select>
                                    <span class="error">{{$errors->first('city')}}</span>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"  placeholder="ايميل الشركة*" value="{{old('email')}}" name="email"/>
                                    <span class="error">{{$errors->first('email')}}</span>
                                </div>
                                <div class="form-group">
                                    <div class="file-field">
                                        <div class="btn btn-primary btn-sm float-left">
                                            <span>أضف شعار الشركة</span>
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                        <span class="error">{{$errors->first('logo')}}</span>
                                    </div>
{{--                                    <div class="col-md-6 col-md-offset-3">--}}
{{--                                        <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">--}}
{{--                                            <div class="col-md-6 col-md-offset-3">--}}
{{--                                                @if ($errors->has('logo'))--}}
{{--                                                    <span class="help-block">--}}
{{--                                                <strong>{{ $errors->first('logo') }}</strong>--}}
{{--                                            </span>--}}
{{--                                                @endif--}}
{{--                                                <div class="fileinput-new thumbnail"--}}
{{--                                                     onclick="document.getElementById('edit_image').click()"--}}
{{--                                                     style="cursor:pointer">--}}
{{--                                                    <img src=" {{url(asset('website/img/ChoosePhoto.png'))}}" id="editImage">--}}
{{--                                                </div>--}}
{{--                                                <div class="btn red"--}}
{{--                                                     onclick="document.getElementById('edit_image').click()">--}}
{{--                                                    <i class="fa fa-pencil"></i>--}}
{{--                                                </div>--}}
{{--                                                <input type="file" class="form-control" name="image"--}}
{{--                                                       id="edit_image" required--}}
{{--                                                       style="display:none">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" maxlength="10" minlength="10" placeholder="رقم الجوال*" value="{{old('mobile')}}" name="mobile"/>
                                    <span class="error">{{$errors->first('mobile')}}</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="العنوان(الشارع)*" value="{{old('street')}}" name="street"/>
                                    <span class="error">{{$errors->first('street')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="training" role="tabpanel" aria-labelledby="home-tab" style="margin-top: -120px">
                        <h3 class="register-heading">بيانات التدريب</h3>
                        <div class="row register-form">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col" style="text-align: center;">مجالات التدريب</th>
                                    <th scope="col" style="text-align: center;">عدد الطلاب</th>
                                    <th scope="col" style="text-align: center;">عدد الطالبات</th>
                                    <th scope="col" style="text-align: center;">أيام التدريب</th>
                                    <th scope="col" style="text-align: center;">الأوقات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="web" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Web</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="numOfMales[]" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="numOfFeMales[]" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="saturday" name="days[]"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="sunday" name="days[]"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="monday" name="days[]"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="tuesday" name="days[]"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="wednesday" name="days[]"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="thursday" name="days[]"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt1">من</label>
                                        <input type="time" id="appt1" name="from[]">
                                        <label for="appt2">إلي</label>
                                        <input type="time" id="appt2" name="to[]">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="design" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Design</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="numOfMales[]" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="numOfFeMales[]" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt3">من</label>
                                        <input type="time" id="appt3" name="from[]">
                                        <label for="appt4">إلي</label>
                                        <input type="time" id="appt4" name="to[]">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="mobile" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Mobile</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="numOfMales[]" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="numOfFeMales[]" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt5">من</label>
                                        <input type="time" id="appt5" name="from[]">
                                        <label for="appt6">إلي</label>
                                        <input type="time" id="appt6" name="to[]">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="network" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Network</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="numOfMales[]" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="numOfFeMales[]" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="" name="days[]"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt7">من</label>
                                        <input type="time" id="appt7" name="from[]">
                                        <label for="appt8">إلي</label>
                                        <input type="time" id="appt8" name="to[]">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="supervisor" role="tabpanel" aria-labelledby="home-tab" style="margin-top: -120px">
                        <h3 class="register-heading">بيانات المشرف</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="اسم المشرف*" name="supName" value="{{old('supName')}}"/>
                                    <span class="error">{{$errors->first('supName')}}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="المسمى الوظيفي*" name="jobTitle" value="{{old('jobTitle')}}"/>
                                    <span class="error">{{$errors->first('jobTitle')}}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btnRegister"  value="تسجيل"name="submit"/>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection