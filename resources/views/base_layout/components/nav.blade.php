<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200" style="padding-top: 20px">
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <br>
        <br>
		<li class="sidebar-search-wrapper">

        </li>
        <li class="nav-item start ">
            <a href="{{route('admin.home')}}" class="nav-link nav-toggle">
                <i class="fa fa-dashboard"></i>
                <span class="title">الرئيسية</span>
                <span class="arrow"></span>
            </a>
        </li>
        <li class="nav-item start ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-user"></i>
                <span class="title">طلاب التدريب</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start ">
                    <a href="{{route('students.index')}}" class="nav-link ">
                        <i class="fa fa-list"></i>
                        <span class="title">عرض</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item start ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-building"></i>
                <span class="title">مؤسسات التدريب</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start ">
                    <a href="{{route('enterprises.index')}}" class="nav-link ">
                        <i class="fa fa-list"></i>
                        <span class="title">عرض</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item start ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-folder"></i>
                <span class="title">بيانات التدريب</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start ">
                    <a href="{{route('training.general')}}" class="nav-link ">
                        <i class="fa fa-list"></i>
                        <span class="title">العام</span>
                    </a>
                </li>
            <?php
            $count_students = \App\Training::where('approved',0)->count();?>
                <li class="nav-item start ">
                    <a href="{{route('special.getSpecialTrainingStudents')}}" class="nav-link ">
                        <i class="fa fa-list"></i>
                        <span class="title">
                            الخاص@if($count_students>0)
                            <span class="badge badge-danger">{{$count_students}}</span></span>
                            @endif</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item start ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-sliders"></i>
                <span class="title">شرائح العرض</span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start ">
                    <a href="{{route('slider.index')}}" class="nav-link ">
                        <i class="fa fa-list"></i>
                        <span class="title">عرض</span>
                    </a>
                </li>
                <li class="nav-item start ">
                    <a href="{{route('slider.create')}}" class="nav-link ">
                        <i class="fa fa-plus"></i>
                        <span class="title">إضافة</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item start ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-file-excel-o"></i>
                <span class="title">بيانات التدريب من اكسل </span>
                <span class="arrow"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item start ">
                    <a href="{{route('import.view')}}" class="nav-link ">
                        <i class="fa fa-plus"></i>
                        <span class="title">إضافة</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
