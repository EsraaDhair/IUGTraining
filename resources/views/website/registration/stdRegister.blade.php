@extends('website.base_layout')
@section('style')
    <style type="text/css">
        .card {
            margin:  0 auto ;/* Added */
            float: none; /* Added */
            background: #ebebeb;
        }
        .error{
            color: red;
            text-align: left;
        }

    </style>
    <link rel="stylesheet" href="{{asset('website/css/form_style.css')}}">
@endsection
@section('content')
{{--    <div class="jumbotron" style="background-image: url('{{asset('website/img/lap3.jpg')}}');opacity:0.7; background-attachment: fixed;background-size: cover;height: 400px">--}}
{{--        <div class="card rounded-pill" style="text-align: center ; width: 25% "  >--}}
{{--            <div class="card-body" style="padding-top: 10px;padding-bottom: 10px">--}}
{{--                أهلاً و سهلاً بكم في التسجيل لتدريب الميداني لعام 2020/2021--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container register" style="margin-bottom: 100px">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="{{asset('website/img/logo.png')}}" alt="logo"/>
                <h3>تسجيل الطلاب</h3>
                <p>التسجيل فقط للطلبة الذين أنهوا 95 ساعة دراسية فما فوق.</p>
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
                    <form action="{{route('std.store')}}" method="post">
                        @csrf
                    <div class="tab-pane fade show active" id="personalInfo" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">البيانات الشخصية</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="الاسم *" name="name" value="{{old('name')}}"/>
                                    <span class="error">{{$errors->first('name')}}</span>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="البريد الإلكتروني *" name="email"value="{{old('email')}}" />
                                    <span class="error">{{$errors->first('email')}}</span>
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
                                    <input type="text" class="form-control"  maxlength="10" minlength="10" placeholder="رقم الجوال * " name="phone" value="{{old('phone')}}" />
                                    <span class="error">{{$errors->first('phone')}}</span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" maxlength="9" minlength="9" placeholder="الرقم الجامعي *" name="stdID" value="{{old('stdID')}}" />
                                    <span class="error">{{$errors->first('stdID')}}</span>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="niche">
                                        <option class="hidden"  selected disabled> اختر تخصصك *</option>
                                        <option value="SD" {{ old('niche') == "SD" ? 'selected' : '' }}>تطوير برمجيات</option>
                                        <option value="MM" {{ old('niche') == "MM" ? 'selected' : '' }}>الوسائط المتعددة و تطوير الويب</option>
                                        <option value="CS" {{ old('niche') == "CS" ? 'selected' : '' }}>علوم الحاسوب</option>
                                        <option value="IS" {{ old('niche') == "IS" ? 'selected' : '' }}>نظم تكنولوجيا المعلومات</option>
                                        <option value="MO" {{ old('niche') == "MO" ? 'selected' : '' }}>الحوسبة المتنقلة و و تطبيقات الأجهزة الذكية</option>
                                    </select>
                                    <span class="error">{{$errors->first('niche')}}</span>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="العنوان ( الشارع ) *" name="street" value="{{old('street')}}" />
                                    <span class="error">{{$errors->first('street')}}</span>
                                </div>
                                <div class="form-group">
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="tab-pane fade show active" id="training" role="tabpanel" aria-labelledby="home-tab" style="margin-top: -120px">
                            <h3 class="register-heading">بيانات التدريب</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p class="display-5" style="text-align: center">   نوع التدريب *</p>
                                    </div>
                                    <div class="form-group">
{{--                                        <select class="form-control" name="sectors[]" multiple size="3" style="display: none;">--}}
{{--                                            @foreach ($sectors as $key => $sector)--}}
{{--                                                <option value="{{ $sector}}" {{ (old("sectors") == $sector ? "selected":"") }}>{{ $sector }}</option>--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
                                        <p style="text-align: center">اختار الرغبة الأولى</p>
                                          <select class="form-control" name="choice"  size="3" id="choice">
                                            <option class="hidden"  selected disabled>مجال التدريب *</option>
                                            <option value="web_front" {{ old('choice') == "web_front" ? 'selected' : '' }}>Web Development(Front-end)</option>
                                            <option value="web_back" {{ old('choice') == "web_back" ? 'selected' : '' }}>Web Development(Back-end)</option>
                                            <option value="android" {{ old('choice') == "android" ? 'selected' : '' }}>Mobile(Android)</option>
                                            <option value="ios" {{ old('choice') == "ios" ? 'selected' : '' }}>Mobile(IOS)</option>
                                            <option value="graphic_design" {{ old('choice') == "graphic_design" ? 'selected' : '' }}>Graphic Design</option>
                                            <option value="network" {{ old('choice') == "network" ? 'selected' : '' }}>Computer Network</option>
                                        </select>
                                        <span class="error">{{$errors->first('choice')}}</span>
                                    </div>
                                    <div style="display: none;" id="choice2">
                                        <p style="text-align: center">اختار الرغبة الثانية</p>
                                        <select class="form-control" name="choice2" size="3" >
                                            <option class="hidden"  selected disabled>مجال التدريب *</option>
                                            <option value="web_front" {{ old('choice2') == "web_front" ? 'selected' : '' }}>Web Development(Front-end)</option>
                                            <option value="web_back" {{ old('choice2') == "web_back" ? 'selected' : '' }}>Web Development(Back-end)</option>
                                            <option value="android" {{ old('choice2') == "android" ? 'selected' : '' }}>Mobile(Android)</option>
                                            <option value="ios" {{ old('choice2') == "ios" ? 'selected' : '' }}>Mobile(IOS)</option>
                                            <option value="graphic_design" {{ old('choice2') == "graphic_design" ? 'selected' : '' }}>Graphic Design</option>
                                            <option value="network" {{ old('choice2') == "network" ? 'selected' : '' }}>Computer Network</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="display: none" id="enterprise">
                                        <input type="text" class="form-control" placeholder="مكان الندريب *" name="placeOfTraining" value="{{old('placeOfTraining')}}"/>
                                  <br>
                                   <a href="{{route('ent.create')}}" target="_blank">الضغط هنا لتسجيل بيانات المؤسسة التي ترغب التدرب بها </a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="type" onclick="myFunction()" value="general" id="general" {{ old('type')=='general'? 'checked' : ''  }}>
                                                <span> عام </span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="type"  onclick="myFunction()" value="special" id="special" {{ old('type')=='special' ? 'checked' : ''  }}>
                                                <span>خاص </span>
                                            </label>
                                        </div>
                                        <span class="error">{{$errors->first('type')}}</span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btnRegister" name="submit"  value="تسجيل"/>
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
        function myFunction() {
            // Get the checkbox
            var special = document.getElementById("special");
            var general = document.getElementById("general");
            var choice2 = document.getElementById("choice2");
            // Get the output text
            var enterprise = document.getElementById("enterprise");

            // If the checkbox is checked, display the output text
            if (special.checked == true) {
                console.log('special');
                enterprise.style.display = "unset";
                choice2.style.display = "none";
            } else if (general.checked == true){
                console.log('general');
                enterprise.style.display = "none";
                choice2.style.display = "unset";
            }
        }
    </script>

@endsection