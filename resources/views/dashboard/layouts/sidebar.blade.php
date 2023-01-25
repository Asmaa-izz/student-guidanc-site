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

                @can('access_teacher')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>المدرسون</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('teachers.index') }}">جميع المدرسين</a></li>
                        <li><a href="{{ route('teachers.create') }}">إضافة مدرس جديد</a></li>
                    </ul>
                </li>
                @endcan

                @can('access_mentor')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>المرشدون</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('mentors.index') }}">جميع المرشدين</a></li>
                        <li><a href="{{ route('mentors.create') }}">إضافة مرشد جديد</a></li>
                    </ul>
                </li>
                @endcan

                @can('access_student')
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span>الطلاب</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('students.index') }}">جميع الطلاب</a></li>
                        <li><a href="{{ route('students.create') }}">اضافة طالب جديد</a></li>
                    </ul>
                </li>
                @endcan

                @can('access_record')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-user-detail"></i>
                            <span>السجلات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('record.index') }}">سجل الطالب</a></li>
                            <li><a href="{{ route('record-visits.index') }}">سجل زيارات اولياء الامور</a></li>
                            <li><a href="{{ route('record-follow-up.index') }}">سجل متابعة المواقف اليومية</a></li>
                        </ul>
                    </li>
                @endcan

                @can('setting')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-user-detail"></i>
                            <span>الاعدادات</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="#">الاعدادات</a></li>
                        </ul>
                    </li>
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
