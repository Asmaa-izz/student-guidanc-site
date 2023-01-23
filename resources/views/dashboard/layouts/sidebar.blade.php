<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">القائمة</li>

                <li>
                    <a href="{{route('dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>الرئيسية</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>المدرسون</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('teachers.index') }}">جميع المدرسون</a></li>
                        <li><a href="{{ route('teachers.create') }}">اضافة طالب مدرس</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>الطلاب</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('students.create') }}">جميع الطلاب</a></li>
                        <li><a href="{{ route('students.create') }}">اضافة طالب جديد</a></li>
                    </ul>
                </li>



{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="has-arrow waves-effect">--}}
{{--                        <i class="bx bxs-cog"></i>--}}
{{--                        <span>الإعدادات</span>--}}
{{--                    </a>--}}
{{--                    <ul class="sub-menu" aria-expanded="false">--}}
{{--                        <li><a href="/dashboard/roles">الصلاحيات</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
