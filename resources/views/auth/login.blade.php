@extends('auth.layouts.masterWithoutNav')

@section('title', 'تسجيل الدخول')

@section('body')
    <body>
    @endsection

    @section('content')
        <div class="home-btn d-none d-sm-block">
            <a href="/" class="text-dark"><i class="fas fa-home h2"></i></a>
        </div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary">
                                            <h4 class="text-primary p-3">مرحبا بك !</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">البريد الالكتروني</label>
                                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" @if(old('email')) value="{{ old('email') }}" @else value="" @endif id="email" placeholder="أدخل البريد الالكتورني" autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">كلمة المرور</label>
                                            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="أدخل كلمة المرور">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">دخول</button>
                                        </div>

                                        {{-- <div class="mt-4 text-center">
                                            <a href="password/reset" class="text-muted"><i class="mdi mdi-lock mr-1"></i>نسيت كلمة المرور ؟</a>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
