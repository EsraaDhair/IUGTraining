@extends('base_layout._layout')
@section('body')
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>استيراد بيانات التدريب </div>
        </div>
        <div class="portlet-body flip-scroll">
    <form action="{{ route('import.students') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">استيراد</button>
    </form>
        </div>
    </div>

@endsection