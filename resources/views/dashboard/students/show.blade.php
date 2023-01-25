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


@endsection
