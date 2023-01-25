@extends('dashboard.layouts.master')

@section('title', "اضافة زيارة أولياء أمور")

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جميع الطلاب")
        @slot('li_2_link', "/dashboard/students")
        @slot('page_now', "اضافة زيارة أولياء أمور")
    @endcomponent

    <form action="{{ route('record-visits.store', $student->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @if($errors->any())
                            <p class="text-danger">{{$errors->first()}}</p>
                        @endif

                        <div class="card-title d-flex justify-content-between align-items-center my-3">
                            <h4>اضافة زيارة أولياء أمور لطالب
                                <strong>{{ $student->name }}</strong>
                                صاحب رقم
                                <strong>{{ $student->number }}</strong>
                            </h4>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label required">اسم ولي الأمر:</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="أدخل اسم ولي الأمر"
                                       value="{{ $student->guardian->name }}" required>
                                @error('name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="attribute" class="control-label required">صفة ولي الأمر:</label>
                                <input type="text" class="form-control" name="attribute" id="attribute"
                                       placeholder="أدخل صفة ولي الأمر"
                                       value="{{ $student->guardian->attribute }}" required>
                                @error('attribute')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="phone" class="control-label required">الهاتف:</label>
                                <input type="text" class="form-control" name="phone" id="phone"
                                       placeholder="أدخل الهاتف"
                                       value="{{ $student->guardian->phone }}" required>
                                @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="notes">ملاحظات:</label>
                                <textarea class="form-control" id="notes" rows="2"></textarea>
                                @error('notes')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" id="button-send">
                                    اضافة
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
