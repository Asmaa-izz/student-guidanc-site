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
                            @can('create_teacher')
                                <li><a href="{{ route('teachers.create') }}">إضافة مدرس جديد</a></li>
                            @endcan
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
                            @can('create_mentor')
                                <li><a href="{{ route('mentors.create') }}">إضافة مرشد جديد</a></li>
                            @endcan
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
                            @can('create_student')
                                <li><a href="{{ route('students.create') }}">اضافة طالب جديد</a></li>
                            @endcan
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
                            @can('access_record')
                                <li><a href="{{ route('record.index') }}">سجل الطالب</a></li>
                            @endcan
                            @can('access_visits_record')
                                <li><a href="{{ route('record-visits.index') }}">سجل زيارات اولياء الامور</a></li>
                            @endcan
                            @can('access_follow_up_record')
                                <li><a href="{{ route('record-follow-up.index') }}">سجل متابعة المواقف اليومية</a></li>
                            @endcan
                            @can('access_guidance_sessions')
                                <li><a href="{{ route('guidance-sessions.index') }}">جلسات ارشادية للطلاب</a></li>
                            @endcan

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
                            @can('setting')
                            <li><a href="{{ route('settings.index') }}">الاعدادات</a></li>
                            @endcan
                            @can('roles')
                            <li><a href="{{ route('roles.index') }}">الصلاحيات</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
