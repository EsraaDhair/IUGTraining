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
                <i class="fa fa-cogs"></i>بيانات المؤسسات المسجلة في التدريب </div>
        </div>
        <div class="portlet-body flip-scroll">
            <a type="button" class="btn green btn-outline" id="button" href="{{route('passwords.enterprises')}}"> تعيين كلمات سر المشرفين</a>
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                </thead>
                <tr>
                    <th> # </th>
                    <th> الاسم </th>
                    <th> الايميل </th>
                    <th> رقم الجوال </th>
                    <th>اسم المشرف</th>
                    <th> مجالات التدريب </th>
                    <th> العنوان </th>
                </tr>
                <tbody>

                @forelse ($enterprises as $en)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td> {{$en->name}}</td>
                        <td> {{$en->email}}</td>
                        <td> {{$en->mobile}}</td>
                        <td> {{$en->supervisor}}</td>
                        <td> {{implode(' | ',$en->sectors)}}</td>
                        <td> {{$en->city}}</td>
                    </tr>
                @empty
                    <td colspan="6">لا يوجد مؤسسات مسجلة</td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
@endsection