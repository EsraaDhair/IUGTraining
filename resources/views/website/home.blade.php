@extends('website.base_layout')
@section('content')
    <div class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('website/img/p.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>First slide label</h5>
                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('website/img/p.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('website/img/p.png')}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary btn-sm rounded-pill">تسجيل دخول</button>
                    <button type="button" class="btn btn-primary btn-sm rounded-pill">تسجيل دخول</button>
                </div>
                <div class="col-md-6">
                    <h4>التدريب الميداني</h4>
                    <hr>
                    <p><br>يعد التدريب الميداني من أهم العوامل التي تساعد على تنمية مهارات
                        <br> و خبرات الطالب الجامعي و تثبيت ما تعلمه خلال دراسته الجامعية، و هناك
                        <br>بعض التخصصات التي تعتمد بشكل كبير على التدريب الميداني. منها:
                       <br> الطب، أو الهندسة أو غيرها.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection