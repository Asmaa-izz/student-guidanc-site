@extends('dashboard.layouts.master')

@section('title', $mentor->name)


@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', "جميع المرشدين")
        @slot('li_2_link', "/dashboard/mentors")
        @slot('page_now', $mentor->name)
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title m-3"><strong>{{ $mentor->name }}</strong></h3>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <strong>البريد الالكتورني :</strong> <span>{{ $mentor->email }}</span>
                                </li>
                                <li class="list-group-item">
                                    <strong>عدد طلابه :</strong> <span>{{ $mentorـstudent_count }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>


@endsection
