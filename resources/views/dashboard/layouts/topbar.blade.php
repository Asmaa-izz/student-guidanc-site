<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('larg-logo.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('larg-logo.png') }}" alt="" height="17">
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('small-logo.png') }}" alt="" height="35">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('larg-logo.png') }}" alt="" height="50">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="website/images/users/avatar-1.jpg"
                        alt="Header Avatar"> --}}
                    <span class="d-none d-xl-inline-block ml-1">{{Auth::user()->name}}</span>
                    <i class="mdi mdi-chevron-down"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item text-danger" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> تسجيل الخروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>