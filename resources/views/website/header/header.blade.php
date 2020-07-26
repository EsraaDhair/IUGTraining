<div class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">    <img src="{{asset('website/img/logo.png')}}" width="50" height="50" class="d-inline-block" alt="logo">
        كلية تكنولوجيا المعلومات</a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Training.manual')}}">دليل التدريب</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Training.committee')}}">لجنة التدريب</a>
            </li>
        </ul>
        <button type="button" class="btn btn-primary btn-sm rounded-pill" onclick="window.location='{{ url("/home") }}'">تسجيل دخول</button>
    </div>
</div>