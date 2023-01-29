<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body style="direction: rtl; text-align: right">
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
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
                        <strong>وصف الموقف :</strong> <span>{{ $record->description_situation }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>معالجة الموقف :</strong> <span>{{ $record->handle_situation }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>الرصد في نون :</strong> <span>{{ $record->show_in_noun ? 'نعم' : 'لا' }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
