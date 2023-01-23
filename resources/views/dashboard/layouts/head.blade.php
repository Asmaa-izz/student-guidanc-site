@yield('css')

<!-- App css -->
<link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;700&display=swap" rel="stylesheet">