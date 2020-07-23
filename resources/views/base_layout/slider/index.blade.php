@extends('base_layout._layout')
@section('body')
    <!-- BEGIN SAMPLE TABLE PORTLET-->
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>شرائح العرض </div>
        </div>
        <div class="portlet-body flip-scroll">
            <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                <thead>
                <tr>
                    <th># </th>
                    <th> العنوان الرئيسي </th>
                    <th> العنوان الفرعي </th>
                    <th> الصورة </th>
                    <th> الترتيب </th>
                    <th> فعال </th>
                    <th> الاجراءات </th>
                </tr>
                </thead>
                <tbody>
                @forelse ($sliders as $slider)
                    <tr>
                        <td> {{$loop->iteration}} </td>
                        <td> {{$slider->title}}</td>
                        <td> {{$slider->subTitle}}</td>
                        <td> <img src= {{asset('')}}{{$slider->image}} width='70' class='img-thumbnail' /></td>
                        <td> {{$slider->rank}}</td>
                        <td> {{$slider->active}}</td>
                        <td style="text-align: center">
                            <a class="btn btn-primary" href="{{route('slider.edit',['id' =>$slider->id ])}}">
                                <i class="fa fa-edit"></i>
                            </a>
{{--                            <a class="btn btn-danger delete-slider"--}}
{{--                               data-id="{{$slider->id}}"--}}
{{--                               data-token="{{ csrf_token() }}">--}}
{{--                                <i class="fa fa-trash"></i>--}}
{{--                            </a>--}}
                        </td>
                    </tr>
                @empty
                    <td colspan="6">لا يوجد شرائح عرض</td>
                @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $('.delete-slider').click(function () {
            var id = $(this).data('id');
            swal({
                    title: "رسالة تأكيد ",
                    text: "هل أنت متأكد ؟",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "نعم ، حذفه",
                    closeOnConfirm: false
                },
                function () {
                    window.location = '{{url('slider/destroy')}}'+'/'+id
                });

        })

    </script>
@endsection