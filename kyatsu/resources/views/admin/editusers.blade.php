<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=}, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST", action="{{route('admin.admin_users.update', ['admin_user' => $user['uuid']])}}">
    @method('PUT')
    @csrf
    <input type="text" id="uuid" readonly value="{{$user['uuid']}}"></input>
    <input type="email" id="email" value="{{$user['email']}}" ></input>
    <input type="text" id="name" value="{{$user['name']}}"></input>
    <input type="submit" ></input>
    </form>
</body>
</html>