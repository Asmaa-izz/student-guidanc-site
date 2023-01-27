@extends('dashboard.layouts.master')

@section('title', "اضافة سجل متابعة المواقف اليومية")

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جميع الطلاب")
        @slot('li_2_link', "/dashboard/students")
        @slot('page_now', "اضافة سجل متابعة المواقف اليومية")
    @endcomponent

    <form action="{{ route('record-follow-up.store', $student->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @if($errors->any())
                            <p class="text-danger">{{$errors->first()}}</p>
                        @endif

                        <div class="card-title d-flex justify-content-between align-items-center my-3">
                            <h4>اضافة سجل متابعة المواقف اليومية الطارئ
                                <strong>{{ $student->name }}</strong>
                                صاحب رقم
                                <strong>{{ $student->number }}</strong>
                            </h4>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="status" class="control-label required">الحالة:</label>
                                <select class="select2 form-control" required
                                        data-placeholder="اختر " name="status">
                                    <option value="نفسية" selected>نفسية</option>
                                    <option value="تربوية">تربوية</option>
                                    <option value="صحية">صحية</option>
                                    <option value="سلوكية">سلوكية</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="class" class="control-label required">الصف:</label>
                                <input type="text" class="form-control" name="class" id="class"
                                       placeholder="أدخل الصف"
                                       value="{{ $student->class }}" required>
                                @error('class')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="description_situation">وصف الموقف:</label>
                                <textarea class="form-control" id="description_situation" rows="2"
                                          name="description_situation"></textarea>
                                @error('notes')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="handle_situation">معالجة الموقف:</label>
                                <textarea class="form-control" id="handle_situation" rows="2"
                                          name="handle_situation"></textarea>
                                @error('notes')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="show_in_noun"
                                           name="show_in_noun">
                                    <label class="form-check-label" for="show_in_noun">الرصد في نون:</label>
                                </div>
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
