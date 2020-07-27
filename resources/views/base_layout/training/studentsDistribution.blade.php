@extends('base_layout._layout')
@section('body')
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i> نتائج توزيع طلبة التدريب الميداني العام </div>
        </div>
        <div class="portlet-body flip-scroll">
            <div class="btn-group" style="margin-bottom: 12px;">
                <a class="btn green" href="javascript:;" data-toggle="dropdown">
                    <i class="fa fa-file"></i>    تصدير بيانات التدريب
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a  href="{{route('export.students',['city'=>'Rafah'])}}">
                            <i class="fa fa-building"></i> رفح </a>
                    </li>
                    <li>
                        <a href="{{route('export.students',['city'=>'khan Yonis'])}}">
                            <i class="fa fa-building-o"></i> خانيونس </a>
                    </li>
                    <li>
                        <a href="{{route('export.students',['city'=>'middle'])}}">
                            <i class="fa fa-building"></i> الوسطى </a>
                    </li>
                    <li>
                        <a href="{{route('export.students',['city'=>'Gaza'])}}">
                            <i class="fa fa-building-o"></i> غزة </a>
                    </li> <li>
                        <a href="{{route('export.students',['city'=>'north'])}}">
                            <i class="fa fa-building"></i> الشمال </a>
                    </li>
                </ul>
            </div>
            <a type="button" class="btn green btn-outline" id="button" href="{{route('passwords.students',['type'=>'G'])}}"> تعيين كلمات سر الطلبة</a>
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                </thead>
                <tr>
{{--                    <th> # </th>--}}
                    <th> الرقم الجامعي </th>
                    <th> اسم الطالب </th>
                    <th> مكان التدريب </th>
                    <th> مجال التدريب </th>
                    <th> عنوان مكان التدريب </th>
{{--                    <th> وقت التدريب </th>--}}
                </tr>
                <tbody>
                @forelse ($Training as $tr)
                    @foreach($tr['students'] as $student)
                        <tr>
{{--                            <td> {{$loop->iteration}} </td>--}}
                            <td> {{$student['student_id']}}</td>
                            <td><a href="{{route('students.index')}}">{{$student['student_name']}}</a> </td>
                            <td> <a href="{{route('enterprises.index')}}">{{$tr['enterprise_name']}}</a></td>
                            <td> {{$tr['sector']}}</td>
                            <td> {{$tr['enterprise_city']}}</td>
                        </tr>
                    @endforeach
                @empty
                    <td colspan="8">لا يوجد طلبة مسجلين</td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
@endsection