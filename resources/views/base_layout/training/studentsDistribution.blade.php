@extends('base_layout._layout')
@section('body')
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i> نتائج توزيع طلبة التدريب الميداني العام </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                </thead>
                <tr>
                    <th> # </th>
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
                            <td> {{$loop->iteration}} </td>
                            <td> {{$student['student_id']}}</td>
                            <td> {{$student['student_name']}}</td>
                            <td> {{$tr['enterprise_name']}}</td>
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