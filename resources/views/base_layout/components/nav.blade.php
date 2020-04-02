<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200" style="padding-top: 20px">
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
		<li class="sidebar-search-wrapper">
            <form class="sidebar-search  " action="page_general_search_3.html" method="POST">
                <a href="javascript:;" class="remove">
                    <i class="icon-close"></i>
                </a>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                </div>
            </form>
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
    </ul>
</div>
