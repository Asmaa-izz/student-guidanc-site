@extends('dashboard.layouts.master')

@section('title', "اضافة جلسة ارشادية")

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جميع الطلاب")
        @slot('li_2_link', "/dashboard/students")
        @slot('page_now', "اضافة جلسة ارشادية")
    @endcomponent

    <form action="{{ route('guidance-sessions.store', $student->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @if($errors->any())
                            <p class="text-danger">{{$errors->first()}}</p>
                        @endif

                        <div class="card-title d-flex justify-content-between align-items-center my-3">
                            <h4>اضافة جلسة ارشادية
                                <strong>{{ $student->name }}</strong>
                                صاحب رقم
                                <strong>{{ $student->number }}</strong>
                            </h4>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="type" class="control-label required">النوع:</label>
                                <select class="select2 form-control" required id="type"
                                        data-placeholder="اختر " name="type">
                                    <option value="تأخر دراسي" selected>تأخر دراسي</option>
                                    <option value="سلوك عدواني">سلوك عدواني</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="place" class="control-label">المكان:</label>
                                <input type="text" class="form-control" name="place" id="place"
                                       placeholder="أدخل المكان"
                                       value="{{old('place')}}">
                                @error('place')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="time" class="control-label">الوقت:</label>
                                <input type="datetime-local" class="form-control" name="time" id="time"
                                       placeholder="أدخل الوقت"
                                       value="{{old('time')}}">
                                @error('time')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="description">الوصف:</label>
                                <textarea class="form-control" id="description" rows="2"
                                          name="description"></textarea>
                                @error('description')
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


@section('script')
    <script>
        function datetimeLocal() {
            const dt = new Date();
            dt.setMinutes(dt.getMinutes() - dt.getTimezoneOffset());
            return dt.toISOString().slice(0, 16);
        }

        const time = document.getElementById('time');
        time.value = datetimeLocal();
    </script>

@endsection

