@extends('website.base_layout')
@section('content')

{{--    <div class="slider">--}}
{{--        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">--}}
{{--            <div class="carousel-inner">--}}
{{--        @foreach($sliders as $slider)--}}
{{--                    <div class="carousel-item active">--}}
{{--                        <img src="{{asset($slider->image)}}" class="d-block w-100" alt="...">--}}
{{--                        <div class="carousel-caption d-none d-md-block">--}}
{{--                            <h5>{{$slider->title}}</h5>--}}
{{--                            <p>{{$slider->subTitle}}</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--        @endforeach--}}
{{--        </div>--}}
{{--        <!-- Left and right controls -->--}}
{{--        <a class="left carousel-control" href="#carouselExampleCaptions" data-slide="prev">--}}
{{--            <span class="glyphicon glyphicon-chevron-left"></span>--}}
{{--            <span class="sr-only">Previous</span>--}}
{{--        </a>--}}
{{--        <a class="right carousel-control" href="#carouselExampleCaptions" data-slide="next">--}}
{{--            <span class="glyphicon glyphicon-chevron-right"></span>--}}
{{--            <span class="sr-only">Next</span>--}}
{{--        </a>--}}
{{--    </div>--}}

    <div class="slider">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i=0;$i<count($sliders);$i++)
                    @if($i==0)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{$i}}" class="active"></li>
                    @else
                <li data-target="#carouselExampleCaptions" data-slide-to="{{$i}}"></li>
                    @endif
                @endfor
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $slider)
                    @if($loop->first)
                <div class="carousel-item active">
                    <img src="{{asset($slider->image)}}" class="d-block w-100" alt="..." width="1319" height="415.61" style="opacity: 0.4;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="display-4" style="color: black;">{{$slider->title}}</h1>
                        <p class="lead" style="color: black; font-size:35px;">{{$slider->subTitle}}</p>
                    </div>
                </div>
                    @else
                        <div class="carousel-item ">
                            <img src="{{asset($slider->image)}}" class="d-block w-100" alt="..." width="1319" height="415.61" style="opacity: 0.5;">
                            <div class="carousel-caption d-none d-md-block">
                                <h1 class="display-4" style="color: black;">{{$slider->title}}</h1>
                                <p class="lead " style="color: black; font-size:35px;">{{$slider->subTitle}}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
{{--                <div class="carousel-item">--}}
{{--                    <img src="{{asset('website/img/p.png')}}" class="d-block w-100" alt="...">--}}
{{--                    <div class="carousel-caption d-none d-md-block">--}}
{{--                        <h5>Second slide label</h5>--}}
{{--                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img src="{{asset('website/img/p.png')}}" class="d-block w-100" alt="...">--}}
{{--                    <div class="carousel-caption d-none d-md-block">--}}
{{--                        <h5>Third slide label</h5>--}}
{{--                        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="button">
                        <button type="button" class="btn btn-primary rounded-pill" onclick="window.location='{{ url("/enterprise/create") }}'" style="background-color: inherit; border:2px solid grey;  color: black; font-size: 20px">تسجيل كمؤسسة</button>
                        <button type="button" class="btn btn-primary rounded-pill" onclick="window.location='{{ url("/student/create") }}'" style="background-color: #04ADEB; border:2px solid #04ADEB; font-size: 20px">تسجيل كطالب</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4>التدريب الميداني</h4>
                    <hr>
                    <p class="font-weight-bold"><br>يعد التدريب الميداني من أهم العوامل التي تساعد على تنمية مهارات
                         و خبرات الطالب الجامعي و تثبيت ما تعلمه خلال دراسته الجامعية، و هناك
                      بعض التخصصات التي تعتمد بشكل كبير على التدريب الميداني، منها:
                         الطب أو الهندسة أو غيرها
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="student">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                        <img src="{{asset('website/img/lap1.jpg')}}" class="rounded">
                </div>
                <div class="col-md-6">
                    <h5>أبرز أهداف التدريب العملي للطلاب/للطالبات </h5>
                    <div class="goals">
                        <p><label>1</label>إتاحة الفرصة للطالب لكسب الخبرة العملية والتدريب قبل التخرج.</p>
                        <p><label>2</label>تعميق فهم الطالب للعلوم النظرية التي تلقوها في مجال تخصصاتهم.</p>
                        <p><label>3</label>تدريب الطالب على تحمل المسئولية والتقيد بالمواعيد.</p>
                        <p><label>4</label>تدريب الطالب على الاحتكاك بالآخرين والاستماع إلى آرائهم.</p>
                        <p><label>5</label>معرفة مدى الإستفادة من الطالب المتدرب وتوظيفه بعد تخرجه.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="enterprises m-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>الشركات المحتضنة</h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        @forelse ($enterprises as $en)
                            <img src="{{$en->logo}}">
                        @empty
                            <h3 style="text-align: center; font-size: 30px">لا يوجد شركات مسجلة</h3>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection