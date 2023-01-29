@extends('dashboard.layouts.master')

@section('title', $student->name)


@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جميع الطلاب")
        @slot('li_2_link', "/dashboard/students")
        @slot('page_now', $student->name)
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title m-3"><strong>{{ $student->name }}</strong></h3>
                    <div class="row">
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>رقم الطالب :</strong> <span>{{ $student->number }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>الجنسية :</strong> <span>{{ $student->nationality }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>العمر :</strong> <span>{{ $student->age }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>اسم ولي الأمر :</strong> <span>{{ $student->guardian->name }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>رقم هاتف ولي الأمر :</strong> <span>{{ $student->guardian->phone }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>صفة ولي الأمر :</strong> <span>{{ $student->guardian->attribute }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>الصف :</strong> <span>{{ $student->class }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>المدرس :</strong> <span>{{ $teacher }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>المرشد :</strong> <span>{{ $mentor }}</span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title m-3"><strong>سجل متابعة زيارات أولياء الأمور
                            [{{ $visitsRecord->count() }}]
                            زيارة</strong></h3>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($visitsRecord as $record)
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item">
                                        <strong>اسم ولي الأمر :</strong> <span>{{ $record->guardian_name }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>رقم هاتف ولي الأمر :</strong> <span>{{ $record->phone }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>صفة ولي الأمر :</strong>
                                        <span>{{ $record->guardian_attribute }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>التاريخ :</strong>
                                        <span>{{ \Carbon\Carbon::parse($record->created_at)->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item @if(!$loop->last) border-bottom @endif">
                                        <strong>ملاحظات :</strong> <span>{{ $record->notes }}</span>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title m-3"><strong>سجل متابعة المواقف اليومية
                            [{{ $followUpRecord->count() }}]
                            مواقف</strong></h3>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($followUpRecord as $record)
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item">
                                        <strong>الصف :</strong> <span>{{ $student->class }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>نوع الحالة :</strong> <span>{{ $record->status }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>مصدر الحالة :</strong> <span>{{ $record->status_source }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>اسم مصدر الحالة :</strong> <span>{{ $record->user->name }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>التاريخ :</strong>
                                        <span>{{ \Carbon\Carbon::parse($record->created_at)->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>وصف الموقف :</strong>
                                        <span>{{ $record->description_situation }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>معالجة الموقف :</strong>
                                        <span>{{ $record->handle_situation }}</span>
                                    </li>
                                    <li class="list-group-item @if(!$loop->last) border-bottom @endif">
                                        <strong>الرصد في نون :</strong>
                                        <span>{{ $record->show_in_noun ? 'نعم' : 'لا' }}</span>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title m-3"><strong>الجلسات التأخر الدراسي
                            [{{ $guidanceSession_lag->count() }}]
                            جلسة</strong></h3>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($guidanceSession_lag as $session)
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <strong>المكان :</strong> <span>{{ $session->place }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>الوقت :</strong>
                                        <span>{{ \Carbon\Carbon::parse($session->time)->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>الوصف :</strong> <span>{{ $session->description }}</span>
                                    </li>
                                </ul>
                                @if(!$loop->last)
                                    <div style="border: 1px solid #000" class="border-bottom"></div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title m-3"><strong>الجلسات السلوك العدواني
                            [{{ $guidanceSession_behavior->count() }}]
                            جلسة</strong></h3>
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($guidanceSession_behavior as $session)
                                <ul class="list-group list-group-flush mb-3">
                                    <li class="list-group-item">
                                        <strong>المكان :</strong> <span>{{ $session->place }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>الوقت :</strong>
                                        <span>{{ \Carbon\Carbon::parse($session->time)->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item @if(!$loop->last) border-bottom @endif">
                                        <strong>الوصف :</strong> <span>{{ $session->description }}</span>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
