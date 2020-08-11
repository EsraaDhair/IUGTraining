@extends('website.base_layout')
@section('content')
    <div class="container">
        <div class="card m-5">
            <h5 class="card-header text-center">بيانات التدريب الميداني</h5>
            <div class="card-body">
                <h5 class="card-title" style="text-align: right">العزيز  {{\Illuminate\Support\Facades\Auth::user()->name}} ، هذه هي تفاصيل التدريب الميداني :</h5>
                <br>
                <h6 style="text-align: right">اسم الشركة :</h6>
                <p style="text-align: center">{{$enterprise[0]->name}}</p>
                <h6 style="text-align: right">عنوان الشركة :</h6>
                <p style="text-align: center">{{$enterprise[0]->city . ' '.$enterprise[0]->street}}</p>
                <h6 style="text-align: right">عدد الطلبة المتدربين : </h6>
                <p style="text-align: center">{{$trainingcount}}</p>
            </div>
        </div>
    </div>
@endsection