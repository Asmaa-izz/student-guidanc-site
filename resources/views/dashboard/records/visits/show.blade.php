@extends('dashboard.layouts.master')

@section('title', "إضافة مدرس جديد")

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "سجل زيارات اولياء الامور")
        @slot('li_2_link', "/dashboard/students")
        @slot('page_now',  "سجل زيارة لطالب ". $student->name)
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
                                        <strong>اسم ولي الأمر :</strong> <span>{{ $record->guardian_name }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>رقم هاتف ولي الأمر :</strong> <span>{{ $record->phone }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>صفة ولي الأمر :</strong> <span>{{ $record->guardian_attribute }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>التاريخ :</strong> <span>{{ \Carbon\Carbon::parse($record->created_at)->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>ملاحظات :</strong> <span>{{ $record->notes }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
