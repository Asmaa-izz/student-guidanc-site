@extends('dashboard.layouts.master')

@section('title', 'الصلاحيات')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}">
    <link href="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/datepicker/datepicker.min.css')}}" type="text/css">
@endsection

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('page_now', "الصلاحيات")
    @endcomponent

    <div class="card">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <h4 class="card-title">الصلاحيات</h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#creatRole">إنشاء
                </button>
            </div>
            <br>
            <div id="accordion">
                @foreach ($roles as $role)
                    <div class="card mb-1 shadow-none">
                        <div class="card-header" id="headingOne">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="m-0">
                                    <a href="#{{ $role->name }}" class="text-dark" data-toggle="collapse" aria-expanded="false"
                                       aria-controls="collapseOne">
                                        {{ $role->name }}
                                    </a>
                                </h6>

                                @if ($role->id > 1)
                                    <div class="d-flex">
                                        <form id="delete-{{ $role->id }}" action="/dashboard/roles/{{ $role->id }}" method="POST"
                                              style="display:none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <button type="button" class="btn p-0" data-toggle="modal" data-target="#a{{ $role->id }}">
                                            <i class="mdi mdi-delete-empty text-danger mdi-24px"></i>
                                        </button>
                                        <button type="button" class="btn" data-toggle="modal" data-target="#edit-{{$role->id}}">
                                            تعديل
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div id="{{ $role->name }}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    @foreach ($role->permissions as $ability)
                                        <li>{{ $ability->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- sample modal content -->
                    <div id="a{{ $role->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myModalLabel">تأكيد
                                        العملية</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    هل أنت متأكد من الحذف
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">إغلاق
                                    </button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light"
                                            onclick="event.preventDefault(); document.getElementById('delete-{{ $role->id }}').submit();">
                                        حذف
                                    </button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    {{----------------------------------------------------}}
                    <div class="modal fade" id="edit-{{$role->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="edit-{{$role->id}}Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit-{{$role->id}}Label">تعديل صلاحية {{$role->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form-edit-role-{{$role->id}}" action="/dashboard/roles/{{$role->id}}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group">
                                            <label for="formrow-firstname-input">اسم الصلاحية </label>
                                            <input type="text" class="form-control" id="formrow-firstname-input" name="name"
                                                   value="{{$role->name }}">
                                        </div>

                                        <div class="docs-toggles overflow-auto" style="height: 50vh">
                                            <ul class="list-group">
                                                @foreach ($permissions as $ability)
                                                    <li class="list-group-item">
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="{{$ability->id}}" type="checkbox"
                                                                   name="ability[]" value="{{$ability->id}}"
                                                                {{ $role->permissions->map->id->contains($ability->id) ? 'checked' : ''}}>
                                                            <label class="form-check-label"
                                                                   for="{{$ability->id}}">{{$ability->name}}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary"
                                            onclick="event.preventDefault(); document.getElementById('form-edit-role-{{$role->id}}').submit();">
                                        حفظ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{----------------------------------------------------}}
                @endforeach

            </div>
        </div>
    </div>

    <div class="modal fade" id="creatRole" tabindex="-1" role="dialog" aria-labelledby="creatRoleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="creatRoleLabel">إنشاء صلاحية جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-create-role" action="/dashboard/roles" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="formrow-firstname-input">اسم الصلاحية </label>
                            <input type="text" class="form-control" id="formrow-firstname-input" name="name">
                        </div>

                        <div class="docs-toggles overflow-auto" style="height: 50vh">
                            <ul class="list-group">
                                @foreach ($permissions as $ability)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" id="{{$ability->id}}" type="checkbox"
                                                   name="ability[]" value="{{$ability->id}}">
                                            <label class="form-check-label" for="{{$ability->id}}">{{$ability->name}}</label>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="button" class="btn btn-primary"
                            onclick="event.preventDefault(); document.getElementById('form-create-role').submit();">حفظ
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/datepicker/datepicker.min.js')}}"></script>

    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js')}}"></script>


@endsection
