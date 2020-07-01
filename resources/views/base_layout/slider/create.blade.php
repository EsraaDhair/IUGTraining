@extends('base_layout._layout')
@section('body')
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>إضافة شريحة عرض</div>
        </div>
        <div class="portlet-body flip-scroll">
            <div class="row">
                <div class="col-md-6 ">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form class="form-horizontal "  role="form" method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> العنوان الرئيسي</label> <span class="danger">*</span>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                            <span class="danger">{{$errors->first('title')}}</span>
                                        </div>
                                    </div>
                                    </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> العنوان الفرعي</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="subTitle" value="{{old('subTitle')}}">
                                            <span class="danger">{{$errors->first('subTitle')}}</span>
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label for="photo" class="col-md-3 control-label">تحميل صورة</label> <span class="danger">*</span>
                                        <input type="file" name="photo" id="photo" value="{{old('photo')}}" />
                                        <span class="danger">{{$errors->first('photo')}}</span>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">الترتيب </label>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="rank" value="1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">فعال </label>
                                    <div class="col-md-9">
                                        <input type="checkbox" class="form-control" name="active" checked>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">حفظ</button>
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
    </div>

@endsection