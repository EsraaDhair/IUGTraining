@extends('website.base_layout')
@section('style')
    <style type="text/css">
        .card {
            margin:  0 auto ;/* Added */
            float: none; /* Added */
            background: #ebebeb;
        }
    </style>
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('website/fonts/material-design-iconic-font/css/material-design-iconic-font.css')}}">
@endsection
@section('content')
    <div class="jumbotron" style="background-image: url('{{asset('website/img/lap3.jpg')}}');opacity:0.7; background-attachment: fixed;background-size: cover;height: 400px">
        <div class="card rounded-pill" style="text-align: center ; width: 25% "  >
            <div class="card-body" style="padding-top: 10px;padding-bottom: 10px">
                أهلاً و سهلاً بكم في التسجيل لتدريب الميداني لعام 2020/2021
            </div>
        </div>
    </div>
    <p class="h3" style="text-align: center">التسجيل فقط للطلبة الذين أنهوا 90 ساعة دراسية فما فوق</p>
    <div class="wrapper">
        <form method="post" action="{{route('std.store')}}" id="wizard" >
            @csrf
            <!-- SECTION 1 -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{asset('website/img/tr.png')}}" alt="" width="368" height="521">
                    </div>
                    <div class="form-content" >
                        <div class="form-header">
                            <h3>التسجيل للتدريب الميداني</h3>
                        </div>
                        <div class="form-row" style="  flex-wrap: unset;">
                            <div class="form-holder">
                                <input type="text" name="name" placeholder="الاسم" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="text" name="stdId" placeholder="الرقم الجامعي" class="form-control">
                            </div>
                        </div>
                        <div class="form-row" style="  flex-wrap: unset;">
                            <div class="form-holder">
                                <input type="email" name="email" placeholder="البريد الإلكتروني" class="form-control">
                            </div>
                            <div class="form-holder">
                                <input type="text" name="phone" placeholder="رقم الجوال" class="form-control">
                            </div>
                        </div>
                        <div class="form-row" style="  flex-wrap: unset;">
                            <div class="form-holder">
                                <input type="text" name="address" placeholder="العنوان" class="form-control">
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- SECTION 2 -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{asset('website/img/tr.png')}}" alt="" width="368" height="521">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>التسجيل للتدريب الميداني</h3>
                        </div>
                        <div class="form-row" style="  flex-wrap: unset;">
                            <div class="form-holder w-100">
                                <div class="select">
                                    <div class="form-holder">
                                        <div class="select-control">	التخصص
                                        </div>
                                    </div>
                                    <ul class="dropdown">
                                        <li rel="SD">تطوير برمجيات</li>
                                        <li rel="MM">ملتيميديا</li>
                                        <li rel="MO">حوسبة متنقلة</li>
                                        <li rel="CS">علوم حاسوب</li>
                                        <li rel="IS">نظم معلومات</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="  flex-wrap: unset;">
                            <div class="form-holder" style="align-self: flex-end; transform: translateY(4px);">
                                <div class="checkbox-tick">	نوع التدريب:

                                    <label>
                                        <input type="radio" name="type" value="general" checked> عام<br>
                                        <span class="checkmark"></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="type" value="special" onclick="myFunction()" id="special"> خاص<br>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row" style="  flex-wrap: unset;">
                            <div class="form-row" id="frow" style="display:none">
                                <input type="text" name="placeOfTraining" placeholder="المكان الذي ترغب التدريب فيه" class="form-control">
                            </div>
                            <div class="form-holder"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- SECTION 3 -->
            <h2></h2>
            <section>
                <div class="inner">
                    <div class="image-holder">
                        <img src="{{asset('website/img/tr.png')}}" alt="" width="368" height="521">
                    </div>
                    <div class="form-content">
                        <div class="form-header">
                            <h3>التسجيل للتدريب الميداني</h3>
                            <p>اختار مجال التدريب حسب الأولوية</p>
                        </div>
                        <div class="form-row" style="  flex-wrap: unset;">
                            <div class="form-holder w-100">
                                <div class="select">
                                    <div class="form-holder">
                                        <div class="select-control">										الرغبة الأولى
                                        </div>
                                    </div>
                                    <ul class="dropdown">
                                        <li rel="web">web</li>
                                        <li rel="mobile">mobile</li>
                                        <li rel="design">design</li>
                                        <li rel="network">network</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-holder w-100">
                                <div class="select">
                                    <div class="form-holder">
                                        <div class="select-control">										الرغبة الثانية
                                        </div>
                                    </div>
                                    <ul class="dropdown">
                                        <li rel="web">web</li>
                                        <li rel="mobile">mobile</li>
                                        <li rel="design">design</li>
                                        <li rel="network">network</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row" id="submitdiv" style="display: none">
                    <input class="btn-success" name="submit" type="submit" value="إرسال">
                </div>
            </section>

        </form>
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
            var checkBox = document.getElementById("special");
            var general = document.getElementById("general");
            // Get the output text
            var row = document.getElementById("frow");

            // If the checkbox is checked, display the output text
            if (checkBox.checked == true) {
                row.style.display = "inline-block";
            } else if (general.checked == true){
                row.style.display = "none";
            }else {
                row.style.display = "none";
            }
        }
    </script>
    <script>
        var div = document.getElementById("submitdiv");
            div.style.display="inline-block";

    </script>
@endsection