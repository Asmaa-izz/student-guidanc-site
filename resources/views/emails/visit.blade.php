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
                        <strong>اسم ولي الأمر :</strong> <span>{{ $record->guardian_name }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>رقم هاتف ولي الأمر :</strong> <span>{{ $record->phone }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>صفة ولي الأمر :</strong> <span>{{ $record->guardian_attribute }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>التاريخ :</strong> <span>{{ \Carbon\Carbon::parse($record->created_at)->format('d/m/Y') }}</span>
                    </li>
                    <li class="list-group-item">
                        <strong>ملاحظات :</strong> <span>{{ $record->notes }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</body>
</html>
