<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('assets/css/bootstrap.min.css')}}" id="bootstrap-light" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('assets/css/app-rtl.min.css')}}" id="app-rtl" rel="stylesheet" type="text/css"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;700&display=swap" rel="stylesheet">
    <title>تقرير</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: Cairo, DejaVu Sans, sans-serif;
            direction: rtl;
            text-align: right;
        }

        .list-group-item {
            border: none;
        }
        .list-group-item {
           padding-top: 0;
           padding-bottom: 0;
        }
    </style>
</head>
<body>
<div class="m-5">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="card border-bottom">
                    <div class="card-body">
                        <h3 class="card-title"><strong> تقرير الطالب : {{ $student->name }}</strong></h3>
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
                                        <strong>رقم هاتف ولي الأمر :</strong>
                                        <span>{{ $student->guardian->phone }}</span>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>صفة ولي الأمر :</strong>
                                        <span>{{ $student->guardian->attribute }}</span>
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

        <div class="row ">
            <div class="col-md-12">
                <div class="card border-bottom">
                    <div class="card-body">
                        <h3 class="card-title"><strong>سجل متابعة زيارات أولياء الأمور
                                [{{ $visitsRecord->count() }}]
                                زيارة</strong></h3>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($visitsRecord as $record)
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item  @if(!$loop->first) pt-3 @endif">
                                            <strong>اسم ولي الأمر :</strong> <span>{{ $record->guardian_name }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>رقم هاتف ولي الأمر :</strong> <span>{{ $record->phone }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>صفة ولي الأمر :</strong>
                                            <span>{{ $record->guardian_attribute }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>التاريخ :</strong>
                                            <span>{{ \Carbon\Carbon::parse($record->created_at)->format('d/m/Y') }}</span>
                                        </li>
                                        <li class="list-group-item @if(!$loop->last) border-bottom pb-2 @endif">
                                            <strong>ملاحظات :</strong> <span>{{ $record->notes }}</span>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12">
                <div class="card border-bottom">
                    <div class="card-body">
                        <h3 class="card-title"><strong>سجل متابعة المواقف اليومية
                                [{{ $followUpRecord->count() }}]
                                مواقف</strong></h3>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($followUpRecord as $record)
                                    <ul class="list-group list-group-flush ">
                                        <li class="list-group-item @if(!$loop->first) pt-3 @endif">
                                            <strong>الصف :</strong> <span>{{ $student->class }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>نوع الحالة :</strong> <span>{{ $record->status }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>مصدر الحالة :</strong> <span>{{ $record->status_source }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>اسم مصدر الحالة :</strong> <span>{{ $record->user->name }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>التاريخ :</strong>
                                            <span>{{ \Carbon\Carbon::parse($record->created_at)->format('d/m/Y') }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>وصف الموقف :</strong>
                                            <span>{{ $record->description_situation }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>معالجة الموقف :</strong>
                                            <span>{{ $record->handle_situation }}</span>
                                        </li>
                                        <li class="list-group-item @if(!$loop->last) border-bottom pb-2 @endif">
                                            <strong>الرصد في نون :</strong>
                                            <span>{{ $record->show_in_noun ? 'نعم' : 'لا' }}</span>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12">
                <div class="card border-bottom">
                    <div class="card-body">
                        <h3 class="card-title"><strong>الجلسات التأخر الدراسي
                                [{{ $guidanceSession_lag->count() }}]
                                جلسة</strong></h3>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($guidanceSession_lag as $session)
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item @if(!$loop->first) pt-3 @endif">
                                            <strong>المكان :</strong> <span>{{ $session->place }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>الوقت :</strong>
                                            <span>{{ \Carbon\Carbon::parse($session->time)->format('d/m/Y') }}</span>
                                        </li>
                                        <li class="list-group-item  @if(!$loop->last) border-bottom pb-2 @endif">
                                            <strong>الوصف :</strong> <span>{{ $session->description }}</span>
                                        </li>
                                    </ul>
                                    @if(!$loop->last)
                                        <div style="border: 1px solid #000" class="border-bottom"></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-md-12">
                <div class="card border-bottom">
                    <div class="card-body">
                        <h3 class="card-title"><strong>الجلسات السلوك العدواني
                                [{{ $guidanceSession_behavior->count() }}]
                                جلسة</strong></h3>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($guidanceSession_behavior as $session)
                                    <ul class="list-group list-group-flush ">
                                        <li class="list-group-item @if(!$loop->first) pt-3 @endif">
                                            <strong>المكان :</strong> <span>{{ $session->place }}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>الوقت :</strong>
                                            <span>{{ \Carbon\Carbon::parse($session->time)->format('d/m/Y') }}</span>
                                        </li>
                                        <li class="list-group-item @if(!$loop->last) border-bottom pb-2 @endif">
                                            <strong>الوصف :</strong> <span>{{ $session->description }}</span>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

</body>

<script type="text/javascript" defer>
    document.addEventListener("DOMContentLoaded", function(event) {
        window.print();
    });


</script>

</html>
