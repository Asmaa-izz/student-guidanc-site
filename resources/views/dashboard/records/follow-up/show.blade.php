@extends('dashboard.layouts.master')

@section('title', " سجل متابعة المواقف اليومية لطالب ". $student->name)

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "سجلات متابعة المواقف اليومية")
        @slot('li_2_link', "/dashboard/students")
        @slot('page_now',  " سجل متابعة المواقف اليومية لطالب ". $student->name)
    @endcomponent

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card-title d-flex justify-content-between align-items-center my-3">
                            <h4>سجل زيارة أولياء أمور لطالب
                                <strong>{{ $student->name }}</strong>
                                صاحب رقم
                                <strong>{{ $student->number }}</strong>
                            </h4>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group list-group-flush">
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
                                        <strong>التاريخ :</strong> <span>{{ \Carbon\Carbon::parse($record->created_at)->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>وصف الموقف :</strong> <span>{{ $record->description_situation }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>معالجة الموقف :</strong> <span>{{ $record->handle_situation }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
