<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@forelse ($banned as $ban)
</hr>
<p>Ban ID: {{$ban['id']}} </p>
<p>Bannable ID: {{$ban['bannable_id']}}</p>
<p>Created by type: {{$ban['created_by_type']}}</p>
<p>Created by id: {{$ban['created_by_id']}}</p>
<p>Comment: {{$ban['comment']}}</p>
<p>expired_at: {{$ban['expired_at']}}</p>
<p>deleted_at" {{$ban['deleted_at']}}</p>
<p>created_At {{$ban['created_at']}}</p>
<p>updated_at {{$ban['updated_at']}}</p>

@empty
Este usuario jamas ha sido suspendido
@endforelse
</body>
</html>