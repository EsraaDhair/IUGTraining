@extends('base_layout._layout')
@section('style')
    <style>
        #button{
            float: left;
            margin-bottom: 20px;
            width: 15%;
        }
    </style>
@endsection
@section('body')
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>بيانات الطلبة المسجلين في التدريب </div>
        </div>
        <div class="portlet-body flip-scroll">
            <a type="button" class="btn green btn-outline" id="button" href="{{route('passwords.students')}}"> تعيين كلمات سر الطلبة</a>
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                </thead>
                <tr>
                    <th> # </th>
                    <th> الاسم </th>
                    <th> الرقم الجامعي </th>
                    <th> الايميل </th>
                    <th> رقم الجوال </th>
                    <th> التخصص </th>
                </tr>
                <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td> {{$student->name}}</td>
                        <td> {{$student->stdId}}</td>
                        <td> {{$student->email}}</td>
                        <td> {{$student->mobile}}</td>
                        <td> {{$student->niche}}</td>
                    </tr>
                @empty
                    <td colspan="6">لا يوجد طلبة مسجلين</td>
                @endforelse
                </tbody>
            </table>
            <div class="com-md-12 text-right">
                {{$students->links()}}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
@endsection