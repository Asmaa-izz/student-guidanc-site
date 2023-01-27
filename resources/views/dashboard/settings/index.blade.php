@extends('dashboard.layouts.master')

@section('title', 'الاعدادات')


@section('content')
    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('page_now', 'الاعدادات')
    @endcomponent


    'الاعدادات'

@endsection
