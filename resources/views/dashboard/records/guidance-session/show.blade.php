@extends('dashboard.layouts.master')

@section('title', " جلسة ارشادية لطالب  ". $student->name)

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جلسات ارشادية للطلاب")
        @slot('li_2_link', "/dashboard/guidance-sessions")
        @slot('page_now',  " جلسة ارشادية لطالب ". $student->name)
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
                                        <strong>النوع :</strong> <span>{{ $session->type }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>المكان :</strong> <span>{{ $session->place }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>الوقت :</strong> <span>{{ \Carbon\Carbon::parse($session->time)->format('d/m/Y') }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>الوصف :</strong> <span>{{ $session->description }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
