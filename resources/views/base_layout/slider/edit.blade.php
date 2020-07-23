@extends('base_layout._layout')
@section('style')
    <style>
        .danger{
            color: red;
        }
    </style>
@endsection
@section('body')
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>تعديل شريحة العرض</div>
        </div>
        <div class="portlet-body flip-scroll">
            <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="portlet light bordered">
                            <form class="form-horizontal "  role="form" action="{{route('slider.update',['id' => $slider->id])}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> العنوان الرئيسي <span class="danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="title" value="{{$slider->title}}">
                                            <span class="danger">{{$errors->first('title')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> العنوان الفرعي</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="subTitle" value="{{$slider->subTitle}}">
                                            <span class="danger">{{$errors->first('subTitle')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="col-md-3 control-label">تحميل صورة</label> <span class="danger">*</span>
                                    <input type="file" name="photo" id="photo" value="{{$slider->photo}}" />
                                    <span class="danger">{{$errors->first('photo')}}</span>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">الترتيب </label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="rank" value="{{$slider->rank}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">فعال </label>
                                    <div class="col-md-9">
                                        <input type="checkbox" class="form-control" name="active" {{($slider->active==1)? 'checked':''}} >
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">تعديل</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->
                </div>
            </div>
        </div>
    </div>
@endsection