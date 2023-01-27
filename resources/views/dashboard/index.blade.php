@extends('dashboard.layouts.master')

@section('title') لوحة التحكم @endsection

@section('content')

@component('dashboard.commonComponents.breadcrumb')
@slot('page_now', "الرئيسية")
@endcomponent

    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-info">
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

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-warning">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $visitsRecord_count }}</h3>
                                <span>مجموع زيارات أولياء الأمور </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-dark">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $followUpRecord_count }}</h3>
                                <span>مجموع سجلات متابعة المواقف اليومية الطارئة</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-danger">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $followUpRecord_count }}</h3>
                                <span>مجموع جلسات الطلاب المتأخرين دراسيا</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-info">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $followUpRecord_count }}</h3>
                                <span>مجموع جلسات الطلاب ذو السلوك العدواني </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-primary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $student_lag_count }}</h3>
                                <span>عدد الطلاب المتأخرين دراسيا</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card bg-soft-secondary">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $student__behavior_count }}</h3>
                                <span>عدد الطلاب ذو السلوك العدواني</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
