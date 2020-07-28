@extends('website.base_layout')
@section('content')
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('website/img/header.jpg')}}" alt="" class="img-fluid" />
                <div class="carousel-caption">
                    <p class="lead" style="font-size: 3rem;">
                        <i class="fa fa-angle-right"></i>
                        التواصل معنا
                        <i class="fa fa-angle-left text-dark"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid gray">
        <p class="text-center lead text-dark m-3">
            يمكنك التواصل معنا من خلال الهاتف
            او البريد الالكتروني أو مواقع التواصل الاجتماعي      </p>

        <div class="row">
            <div class="col-md-6">
                <h3 class="text-right text-info mb-5">
                    الهاتف:
                    <strong class="text-dark"> 2644400 8 970+  </strong>
                </h3>
                <h3 class="text-right text-info mb-5">
                    البريد الالكتروني
                    <strong class="text-dark">itc@iugaza.edu.ps</strong>
                </h3>
                <h3 class="text-right text-info mb-5">
                    الهاتف الداخلي
                    <strong class="text-dark">2950,2962</strong>
                </h3>
                <div class="line" ></div>
                <div class="d-flex">
                    <a href="#">
                        <img src="{{asset('website/img/facebook.png')}}" class="ml-5" width="50" alt="" />
                    </a>
                    <a href="#">
                        <img src="{{asset('website/img/twitter.png')}}" class="ml-5" width="50" alt="" />
                    </a>
                    <a href="#">
                        <img src="{{asset('website/img/instgram.png')}}" class="ml-5" width="50" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <img
                        src="{{asset('website/img/Group 23.png')}}"
                        class="img-fluid pb-4" width="100%"
                        alt=""
                />

            </div>
        </div>
    </div>

@endsection