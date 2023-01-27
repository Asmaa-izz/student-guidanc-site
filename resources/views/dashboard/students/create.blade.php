@extends('dashboard.layouts.master')

@section('title', "إضافة طالب جديد")

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جميع الطلاب")
        @slot('li_2_link', "/dashboard/students")
        @slot('page_now', "إضافة طالب جديد")
    @endcomponent

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                @if($errors->any())
                    <p class="text-danger">{{$errors->first()}}</p>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex justify-content-between align-items-center my-3">
                            <h4>إضافة طالب جديد</h4>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="number" class="control-label required">رقم الطالب:</label>
                                <input type="text" class="form-control" name="number" id="number" placeholder="أدخل رقم الطالب"
                                       value="{{ $number }}" required>
                                @error('number')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="name" class="control-label required">اسم الطالب:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="أدخل اسم الطالب"
                                       value="{{old('name')}}" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="class" class="control-label required">الصف:</label>
                                <input type="text" class="form-control" name="class" id="class" placeholder="أدخل الصف"
                                       value="{{old('class')}}" required>
                                @error('class')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-4">
                                <label for="teacher" class="control-label required">المدرس:</label>
                                <select class="select2 form-control" required
                                        data-placeholder="اختر المدرس" name="teacher" id="teacher">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" data-idcat="{{ $teacher->id  }}">
                                            {{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="mentor" class="control-label required">المرشد:</label>
                                <select class="select2 form-control" required
                                        data-placeholder="اختر المرشد" name="mentor" id="mentor">
                                    @foreach ($mentors as $mentor)
                                        <option value="{{ $mentor->id }}" data-idcat="{{ $mentor->id  }}">
                                            {{ $mentor->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="guardian_name" class="control-label required">اسم ولي الأمر:</label>
                                <input type="text" class="form-control" name="guardian_name" id="guardian_name" placeholder="أدخل اسم ولي الأمر"
                                       value="{{old('guardian_name')}}" required>
                                @error('guardian_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="guardian_email" class="control-label required">البريد الالكتورني لولي الأمر:</label>
                                <input type="email" class="form-control" name="guardian_email" id="guardian_email" placeholder="أدخل البريد الالكتروني لولي الأمر"
                                       value="{{old('guardian_name')}}" required>
                                @error('guardian_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="guardian_phone" class="control-label">رقم هاتف ولي الأمر:</label>
                                <input type="text" class="form-control" name="guardian_phone" id="guardian_phone" placeholder="أدخل رقم هاتف ولي الأمر"
                                       value="{{old('guardian_phone')}}">
                                @error('guardian_phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="guardian_attribute"> صفة ولي الامر:</label>
                                <input type="text" class="form-control" name="guardian_attribute" id="guardian_attribute" placeholder="أدخل  صفة ولي الامر"
                                       value="{{old('guardian_attribute')}}">
                                @error('guardian_attribute')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nationality">الجنسية:</label>
                                <input type="text" class="form-control" name="nationality" id="nationality" placeholder="أدخل الجنسية"
                                       value="{{old('nationality')}}">
                                @error('nationality')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="age">العمر:</label>
                                <input type="number" class="form-control" name="age" id="age" placeholder="أدخل العمر"
                                       value="{{old('age')}}">
                                @error('age')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="notes">ملاحظات:</label>
                                <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                                @error('notes')
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
