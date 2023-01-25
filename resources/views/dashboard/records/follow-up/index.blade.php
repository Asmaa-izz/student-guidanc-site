@extends('dashboard.layouts.master')

@section('title', 'سجل الطالب')

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('li_2', $student->name)
        @slot('li_2_link', "/dashboard/students/" . $student->id)
        @slot('page_now', "سجل الطالب")
    @endcomponent


@endsection
