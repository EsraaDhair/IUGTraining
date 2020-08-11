@extends('base_layout._layout')
@section('body')
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <form method="post" action="{{ route('special.getApproved') }}">
        @csrf
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>بيانات طلبة التدريب الخاص </div>
        </div>
        <div class="portlet-body flip-scroll">
            <a type="button" class="btn green btn-outline" id="button" href="{{route('passwords.students',['type'=>'S'])}}"> تعيين كلمات سر الطلبة</a>
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                </thead>
                <tr>
                    <th> الاسم </th>
                    <th> مجال التدريب </th>
                    <th> اسم الشركة </th>
                    <th> موافقة </th>
                </tr>
                <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td> {{$student->name}}</td>
                        <td> {{$student->sector}}</td>
                        <td> {{$student->placeOfTraining}}</td>
                        <th scope="row">
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes chkBox" value="{{$student->id}}" name="chkBox" {{($student->approved==1 ? ' checked' : '')}} />
                                <span></span>
                            </label>
                        </th>
                    </tr>

                @empty
                    <td colspan="5">لا يوجد طلبة مسجلين</td>
                @endforelse
                </tbody>
            </table>
            <div class="form-group" style="text-align: left">
                <input class="btn green btn-outline" value="موافقة" name="submit" type="submit">
            </div>

        </div>
    </div>
    </form>
    <!-- END SAMPLE TABLE PORTLET-->
@endsection