@extends('website.base_layout')
@section('style')
    <style>
        .opacity {
            opacity: 0.4;
        }
        .cover {
            background: rgba(99, 99, 235, 0.5);
        }
        .cover-green{
            background: rgba(20, 223, 109, 0.64)
        }
        .color {
            color: #575752;
        }
        .bold{
            font-weight: bolder;
        }
        .over::before{
            content: '';
            width: 100%;
            height: 42%;
            position: absolute;
            background:rgba(16, 128, 233, 0.5);
            left: 0;
            right: 0;
            top: 0;
            bottom: 10px;
            overflow: hidden;
        }
        .raduis {
            border-radius: 20px;
        }

        .after::before {
            content: "___";
            /* width: 10%; */
            position: absolute;
            bottom: 40%;
            top: 40%;

            color: rgb(90, 199, 76);
            font-size: 1.5rem;
            right: 2rem;
            display: flex;
            letter-spacing: 10px;
            overflow: hidden;
        }
        .element {
            width: 6.3rem;
            height: 6.3rem;
            border-radius: 50%;
            /* line-height: 1.4; */
            border: 1px double #ccc;
            border-right-color: rgb(204, 204, 204);
            border-left-color: rgb(204, 204, 204);
            /* border-left-color: #2d2;
            border-right-color: #2d2; */
            text-align: center;
            position: relative;
            right: 26px;

        }
        .position-text {
            position: relative;
            bottom: 9rem;
        }
        .fa-rotate-left {
            position: relative;
            top: 109px;
            bottom: 58px;
            transform: rotate(-49deg);
            font-size: 10rem;
            left: -51px;
            right: -11px;
        }
        .fa-rotate-right {
            position: relative;
            top: 0;

            transform: rotate(-48deg);
            font-size: 10rem;
            left: 4px;
        }
        .icon {
            width: 2rem;
            height: 2rem;
            border: 1px solid #f4e6e6;
            line-height: 30px;
            text-align: center;
            border-radius: 11px;
            font-size: 1.5rem;
            color: #fff;
        }
        .hover {
            transition: 0.5s ease-in-out;
        }
        .hover:hover {
            background-color: #2d2;
            color: #fff;
        }

        /* @media (max-width: 668px) {
         .position-text {
           bottom: 0;
         }
         .fa-rotate-right,
         .fa-rotate-left {
           display: none;
         }
         .over::before{
           display: none;
         }
       }  */

        @media(max-width:768px){
            .over::before{
                display: none;
            }
            .position-text {
                bottom: 0;
            }
            .fa-rotate-right,
            .fa-rotate-left {
                display: none;
            }
            .over::before{
                display: none;
            }
        }
        @media(max-width:992px){
            .over::before{
                height: 22%;
            }
        }
        @media(max-width:1200px){
            /* body{display: none;} */
        }
    </style>
@endsection
@section('content')
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('website/img/header.jpg')}}" alt="" class="img-fluid" />
                <div class="carousel-caption">
                    <p class="lead" style="font-size: 3rem;">
                        <i class="fa fa-angle-right"></i>
                        لجنة العلاقات الخارجية والتدريب
                        <i class="fa fa-angle-left text-dark"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- الكورسات -->
    <div class="container mt-4">
        <h2 class="text-center display-5">أعضاء لجنة التدريب</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="over" ></div>
                    <img src="{{asset('website/img/3.png')}}" class="card-img-top" alt="" />
                    <h5 class="card-title text-center">د.توفيق برهوم</h5>
                    <div class="card-body">
                        <p class="card-text">

                            رئيس قسمي / علم الحاسوب و تطوير البرمجيات

                            تكنولوجيا
                        </p>

                        <hr />
                        <h6 class="text-center">الساعات المكتبية
                            :من الساعة 11 الى الساعة 1</h6>
                        <hr />
                        <h6 class="text-center">البريد الالكتروني:tbarhoom@iugaza.edu

                        </h6>
                        <hr />
                        <a href="http://site.iugaza.edu.ps/tbarhoom" class="btn btn-info btn-sm btn-block raduis"
                        >تواصل الان</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="over"></div>
                    <img src="{{asset('website/img/4.png')}}" class="img-fluid" alt="" />
                    <h5 class="card-title text-center">د.رائد رشيد</h5>
                    <div class="card-body">
                        <p class="card-text">
                            ماجستير. تكنولوجيا المعلومات والويب وتقنيات الوسائط المتعددة
                        </p>
                        <hr />
                        <h6 class="text-center">الساعات المكتبية
                            :من الساعة 10 الى الساعة 2</h6>
                        <hr />
                        <h6 class="text-center">البريد الالكتروني: rrasheed@iugaza.edu.ps
                        </h6>
                        <hr />
                        <a href="http://site.iugaza.edu.ps/rrasheed" class="btn btn-info btn-sm btn-block raduis"
                        >تواصل الان</a
                        >
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="over"></div>
                    <img src="{{asset('website/img/5.png')}}" class="img-fluid" alt="" />
                    <h5 class="card-title text-center">د.أشرف مغاري</h5>
                    <div class="card-body">
                        <p class="card-text">
                            رئيس قسم تكنولوجيا الوسائط المتعددة وتطوير الويب
                        </p>
                        <hr />
                        <h6 class="text-center">الساعات المكتبية
                            :من الساعة 10 الى الساعة 1</h6>
                        <hr />
                        <h6 class="text-center">البريد الالكتروني:amaghari@iugaza.edu.ps
                        </h6>
                        <hr />
                        <a href="http://site.iugaza.edu.ps/amaghari" class="btn btn-info btn-sm btn-block raduis"
                        >تواصل الان</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features -->
    <div class="bg-light mt-5">
        <h1 class="text-center pt-3">مجلس كلية تكنولوجيا المعلومات </h1>
        <div class="container p-5 text-center">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('website/img/12.png')}}" class="element ml-5" alt="" />
                    <h5 class="bold">أستاذ مشارك</h5>
                    <p class="">
                        د ربحـــي سليمان بركــــة

                        عميد كلية تكنولوجيا المعلومات
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('website/img/13.png')}}" class="element ml-5" alt="" />
                    <h5 class="bold">أستاذ مساعد</h5>
                    <p>
                        د. باسـم عمر العجلة
                        نائب عميد كلية تكنولوجيا المعلومات
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('website/img/14.png')}}" class="element ml-5" alt="" />
                    <h5 class="bold">أستاذ مساعد
                    </h5>
                    <p>
                        د. إيــاد حسني الشامي
                        رئيس قسم علم الحاسوب وقسم تطوير البرمجيات
                        وقسم الحاسوب وأساليب تدريسه            </p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <img src="{{asset('website/img/15.png')}}" class="element ml-5" alt="" />
                    <h5 class="bold">أستاذ مساعد</h5>
                    <p class="">
                        د. أشرف يونس مغاري
                        رئيس قسم تكنولوجيا الوسائط المتعددة وتطوير الويب
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('website/img/16.png')}}" class="element ml-5" alt="" />
                    <h5 class="bold">أستاذ مشارك</h5>
                    <p>
                        د. إياد محمد الأغا
                        ر رئيس قسم الحوسبة المتنقلة وتطبيقات الأجهزة الذكية وقسم تكنولوجيا المعلومات          </p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('website/img/17.png')}}" class="element ml-5" alt="" />
                    <h5 class="bold">ماجستير - إدارة أعمال</h5>
                    <p>
                        أ. عرفــــات محمد أبو جــــري
                        مدير كلية تكنولوجيا المعلومات            </p>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-center display-5">أقسام كلية تكنولوجيا المعلومات</h2>
    <div class="row m-5">
        <div class="col-lg col-md mt-sm-1">
            <div class="card bg-dark text-white text-center">
                <img
                        src="{{asset('website/img/it.png')}}"
                        class="card-img"
                        alt="..."
                />
                <div class="card-img-overlay cover">
                    <h6 class="card-title text-center ">الوسائط المتعددة وتطوير الويب</h6>
                </div>
            </div>

        </div>
        <div class="col-md mt-1">
            <div class="card bg-dark text-white text-center">
                <img
                        src="{{asset('website/img/it.png')}}"
                        class="card-img"
                        alt="..."
                />
                <div class="card-img-overlay cover">
                    <h6 class="card-title text-center">علم الحاسوب</h6>
                </div>
            </div>
        </div>
        <div class="col-md mt-1">
            <div class="card bg-dark text-white text-center">
                <img
                        src="{{asset('website/img/it.png')}}"
                        class="card-img"
                        alt="..."
                />
                <div class="card-img-overlay cover">
                    <h6 class="card-title text-center">نظم تكنولوجيا المعلومات </h6>
                </div>
            </div>
        </div>
        <div class="col-md mt-1">
            <div class="card bg-dark text-white text-center">
                <img
                        src="{{asset('website/img/it.png')}}"
                        class="card-img"
                        alt="..."
                />
                <div class="card-img-overlay cover">
                    <h6 class="card-title text-center"> تطوير برمجيات</h6>
                </div>
            </div>
        </div>
        <div class="col-md mt-1">
            <div class="card bg-dark text-white text-center">
                <img
                        src="{{asset('website/img/it.png')}}"
                        class="card-img"
                        alt="..."
                />
                <div class="card-img-overlay cover">
                    <h6 class="card-title text-center ">الحوسبة المتنقلة وتطبيقات الأجهزة الذكية</h6>
                </div>
            </div>
        </div>

    </div>
@endsection