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
                <i class="fa fa-cogs"></i>بيانات التدريب العام </div>
        </div>
        <div class="portlet-body flip-scroll">
            <a type="button" class="btn green btn-outline" id="button" href="{{route('distribute.students')}}">توزيع الطلبة</a>
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                </thead>
                <tr>
                    <th> # </th>
                    <th> اسم الطالب </th>
                    <th> الرقم الجامعي </th>
                    <th> الرغبة الأولى </th>
                    <th> الرغبة الثانية </th>
                </tr>
                <tbody>
                @forelse ($gTrainings as $gTraining)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td> {{$gTraining->name}}</td>
                        <td> {{$gTraining->stdId}}</td>
                        <td> {{$gTraining->first_choice}}</td>
                        <td> {{$gTraining->second_choice}}</td>
                    </tr>
                @empty
                    <td colspan="5">لا يوجد طلبة مسجلين</td>
                @endforelse
                </tbody>
            </table>
            <div class="com-md-12 text-right">
                {{$gTrainings->links()}}
            </div>
        </div>
    </div>
    <!-- END SAMPLE TABLE PORTLET-->
@endsection