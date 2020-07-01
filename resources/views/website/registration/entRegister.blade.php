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
                                <div class="col-md-12">
                                    <p style="text-align: center">مجالات التدريب</p>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes chkBox" value="web front" name="web front" id="front"/>
                                        <span>Web Front_end</span>
                                    </label>
                                   <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes chkBox" value="web back" name="web back" id="back"/>
                                        <span>Web Back_end</span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes chkBox" value="android" name="android" id="android"/>
                                        <span>Mobile - Android</span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes chkBox" value="ios" name="ios" id="ios"/>
                                        <span>Mobile - IOS</span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes chkBox" value="graphic design" name="graphic design" id="design"/>
                                        <span>Graphic Design</span>
                                    </label>
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input type="checkbox" class="checkboxes chkBox" value="network" name="network" id="network"/>
                                        <span>Computer Network</span>
                                    </label>
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
                                <tr id="Sfront" style="display:none">
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="web_front" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Front_End</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="web_front,numOfMales" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="web_front,numOfFeMales" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="saturday" name="web_front,saturday"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="sunday" name="web_front,sunday"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="monday" name="web_front,monday"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="tuesday" name="web_front,tuesday"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="wednesday" name="web_front,wednesday"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="thursday" name="web_front,thursday"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt1">من</label>
                                        <input type="time" id="appt1" name="web_frontfrom">
                                        <label for="appt2">إلي</label>
                                        <input type="time" id="appt2" name="web_frontto">
                                    </td>
                                </tr>
                                <tr id="Sback" style="display:none">
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="web_back" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Back_End</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="web_back,numOfMales" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="web_back,numOfFeMales" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="saturday" name="web_back,saturday"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="sunday" name="web_back,sunday"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="monday" name="web_back,monday"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="tuesday" name="web_back,tuesday"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="wednesday" name="web_back,wednesday"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="thursday" name="web_back,thursday"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt1">من</label>
                                        <input type="time" id="appt1" name="web_backfrom">
                                        <label for="appt2">إلي</label>
                                        <input type="time" id="appt2" name="web_backto">
                                    </td>
                                </tr>
                                <tr id="Sdesign" style="display:none">
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="graphic_design" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Graphic Design</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="graphic_design,numOfMales" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="graphic_design,numOfFeMales" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="saturday" name="graphic_design,saturday"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="sunday" name="graphic_design,sunday"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="monday" name="graphic_design,monday"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="tuesday" name="graphic_design,tuesday"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="wednesday" name="graphic_design,wednesday"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="thursday" name="graphic_design,thursday"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt3">من</label>
                                        <input type="time" id="appt3" name="graphic_designfrom">
                                        <label for="appt4">إلي</label>
                                        <input type="time" id="appt4" name="graphic_designto">
                                    </td>
                                </tr>
                                <tr id="Sandroid" style="display:none">
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="android" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Android</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="android,numOfMales" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="android,numOfFeMales" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="saturday" name="android,saturday"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="sunday" name="android,sunday"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="monday" name="android,monday"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="tuesday" name="android,tuesday"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="wednesday" name="android,wednesday"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="thursday" name="android,thursday"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt5">من</label>
                                        <input type="time" id="appt5" name="androidfrom">
                                        <label for="appt6">إلي</label>
                                        <input type="time" id="appt6" name="androidto">
                                    </td>
                                </tr>
                                <tr id="Sios" style="display:none">
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="ios" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">IOS</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="ios,numOfMales" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="ios,numOfFeMales" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="saturday" name="ios,saturday"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="sunday" name="ios,sunday"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="monday" name="ios,monday"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="tuesday" name="ios,tuesday"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="wednesday" name="ios,wednesday"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="thursday" name="ios,thursday"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt5">من</label>
                                        <input type="time" id="appt5" name="iosfrom">
                                        <label for="appt6">إلي</label>
                                        <input type="time" id="appt6" name="iosto">
                                    </td>
                                </tr>
                                <tr id="Snetwork" style="display:none">
                                    <th scope="row"> <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="network" name="chkBox[]"/>
                                            <span></span>
                                        </label>
                                    </th>
                                    <td style="text-align: center;">Network</td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="network,numOfMales" /></td>
                                    <td style="text-align: center;"><input type="number" class="form-control" placeholder="" name="network,numOfFeMales" /></td>
                                    <td style="text-align: center;">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="saturday" name="network,saturday"/>
                                            <span>سبت</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="sunday" name="network,sunday"/>
                                            <span>أحد</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="monday" name="network,monday"/>
                                            <span>إثنين</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline" style="margin-right: 10px;">
                                            <input type="checkbox" class="checkboxes chkBox" value="tuesday" name="network,tuesday"/>
                                            <span>ثلاثاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="wednesday" name="network,wednesday"/>
                                            <span>اربعاء</span>
                                        </label>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input type="checkbox" class="checkboxes chkBox" value="thursday" name="network,thursday"/>
                                            <span>خميس</span>
                                        </label>
                                    </td>
                                    <td style="text-align: center;">
                                        <label for="appt7">من</label>
                                        <input type="time" id="appt7" name="networkfrom">
                                        <label for="appt8">إلي</label>
                                        <input type="time" id="appt8" name="networkto">
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
@section('script')
    <!-- JQUERY -->
    <script src="{{asset('website/js/jquery-3.3.1.min.js')}}"></script>

    <!-- JQUERY STEP -->
    <script src="{{asset('website/js/jquery.steps.js')}}"></script>
    <script src="{{asset('website/js/main.js')}}"></script>
    <script>
        $('#front').change(function() {
            $('#Sfront').toggle();
        });
        $('#back').change(function() {
            $('#Sback').toggle();
        });
        $('#design').change(function() {
            $('#Sdesign').toggle();
        });
        $('#android').change(function() {
            $('#Sandroid').toggle();
        });
        $('#ios').change(function() {
            $('#Sios').toggle();
        });
        $('#network').change(function() {
            $('#Snetwork').toggle();
        });

    </script>

@endsection