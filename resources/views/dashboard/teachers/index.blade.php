@extends('dashboard.layouts.master')

@section('title', "المدرسون")

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('page_now', "المدرسون")
    @endcomponent

@endsection
