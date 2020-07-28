@extends('base_layout._layout')
@section('body')
    <h1 align="center">التدريب الميداني - كلية تكنولوجيا المعلومات</h1>
    <div style="margin-top: 50px">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span>{{$students}}</span>
                        </div>
                        <div class="desc">عدد الطلبة المسجلين </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span>{{$enterprises}}</span> </div>
                        <div class="desc"> عدد الشركات المسجلة </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span>{{$str}}</span> </div>
                        <div class="desc"> التدريب الخاص </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span>{{$gtr}}</span> </div>
                        <div class="desc"> التدريب العام </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
