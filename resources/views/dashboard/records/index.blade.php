@extends('dashboard.layouts.master')

@section('title', 'سجل الطلاب')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/loading-spinner-overlay.css')}}">
@endsection

@section('content')

    @component('dashboard.commonComponents.breadcrumb')
        @slot('li_1', "الرئيسية")
        @slot('li_1_link', "/dashboard")
        @slot('page_now', 'سجل الطلاب')
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-3">
                    <div class="card-title d-flex justify-content-between align-items-center my-3">
                        <h4>سجل الطلاب</h4>
{{--                        <a href="{{ route('students.create') }}" class="btn btn-primary">إضافة طالب جديد</a>--}}
                    </div>

                    <table id="students" class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>رقم الطالب</th>
                            <th>اسم الطالب</th>
                            <th>ولي الأمر</th>
                            <th>رقم الهاتف</th>
                            <th>صفة ولي الأمر</th>
                            <th>سجل الطالب السلوكي</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#students').DataTable({
                // processing: true,
                serverSide: true,
                ajax: "{{ route('record.index') }}",
                columns: [
                    {"data": "number"},
                    {"data": "name"},
                    {"data": "guardian_name"},
                    {"data": "phone"},
                    {"data": "attribute"},
                    {"data": "record"},
                ],
            });
        });


        function deleteProduct(id) {
            Swal.fire({
                title: 'هل أنت متأكد من عملية الحذف ؟',
                text: "تنبيه , لا يمكن استعادة البيانات",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم , احذف!',
                cancelButtonText: 'إلفاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("div.spanner").addClass("show");
                    $("div.overlay").addClass("show");
                    fetch(`/dashboard/students/${id}`, {
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                        },
                        method: "delete",
                    })
                        .then(response => location = window.location)
                        .catch(error => console.log("error : " + error));
                }
            })

        }
    </script>

@endsection
