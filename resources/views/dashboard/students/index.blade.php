@extends('dashboard.layouts.master')

@section('title', 'الطلاب')

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('page_now', "الطلاب")
    @endcomponent

@endsection
