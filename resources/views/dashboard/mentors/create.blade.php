@extends('dashboard.layouts.master')

@section('title', "إضافة مرشد جديد")

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جميع المرشدين")
        @slot('li_2_link', "/dashboard/mentors")
        @slot('page_now', "إضافة مرشد جديد")
    @endcomponent

    <form action="{{ route('mentors.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @if($errors->any())
                            <p class="text-danger">{{$errors->first()}}</p>
                        @endif

                        <div class="card-title d-flex justify-content-between align-items-center my-3">
                            <h4>إضافة مرشد جديد</h4>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label required">اسم المرشد:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="أدخل الاسم"
                                       value="{{old('name')}}" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="email" class="control-label required">البريد الإلكتروني:</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="أدخل البريد الإلكتروني"
                                       value="{{old('email')}}" required>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="password" class="control-label required"> كلمة المرور:</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="أدخل كلمة المرور"
                                       value="{{old('password')}}" required>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" id="button-send">
                                    حفظ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
