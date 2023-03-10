@extends('dashboard.layouts.master')

@section('title', $teacher->name)


@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جميع المدرسين")
        @slot('li_2_link', "/dashboard/teachers")
        @slot('page_now', $teacher->name)
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title m-3"><strong>{{ $teacher->name }}</strong></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>البريد الالكتورني :</strong> <span>{{ $teacher->email }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>عدد طلابه :</strong> <span>{{ $teacherـstudent_count }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


@endsection
