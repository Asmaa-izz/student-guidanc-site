@extends('dashboard.layouts.master')

@section('title') لوحة التحكم @endsection

@section('content')

@component('dashboard.commonComponents.breadcrumb')
@slot('page_now', "الرئيسية")
@endcomponent

    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-info">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $teacher_count }}</h3>
                                <span>عدد المدرسين</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-pink">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $mentor_count }}</h3>
                                <span>عدد المرشدين</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-success">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $student_count }}</h3>
                                <span>عدد الطلاب</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
