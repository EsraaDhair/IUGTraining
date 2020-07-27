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
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading"><i class="fa fa-search"></i>البحث</div>
                    <div class="panel-body">
                        <form action="{{route('students.index')}}" method="get">
                            <div class=" form-group col-sm-4">
                                <label for="name">الاسم</label>
                                <input type="text" name="name" value="{{app('request')->get('name')}}">
                            </div>
                            <div class=" form-group col-sm-4">
                                <label for="stdId">الرقم الجامعي</label>
                                <input type="text" name="stdId" value="{{app('request')->get('stdId')}}" maxlength="9">
                            </div>
                            <div class=" form-group col-md-12">
                                <input type="submit" value="بحث" class="btn btn-primary">
                                <a class=" btn btn-default" href="{{route('students.index')}}">إلغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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