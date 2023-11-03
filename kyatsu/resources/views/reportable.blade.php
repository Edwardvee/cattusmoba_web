@extends("maintemplate")

@section("http_headers")
<br>
<br>
<br>
<br>
<div class="container">
    <link rel="stylesheet" href="{{url('css/usershow.css')}}">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endsection
@section("http_body")
<div class="card">
        <div class="card-body">
            <form method="POST" , action="{{route('admin.bannable.store')}}">
                @csrf
                <div class="row">
                    <div class="mb-2 col-12">
                    <p class="text-center">Post UUID:</p>
                        <input type="text" name="post_uuid" class="form-control" id="uuid" readonly value="{{$post['uuid']}}"></input>
                    </div>
                    <div class="mb-2 col-12">
                    <p class="text-center">Nombre de usuario:</p>
                        <input type="text" class="form-control" id="name" readonly value="{{$user['name']}}"></input>
                    </div>
                    <div class="mb-2 col-12">
                    <p class="text-center">Razon:</p>
                    <select name="reason">
                    @foreach($banReasons as $ban_reason)
                     <option value="{{$ban_reason['uuid']}}">{{$ban_reason['name']}}</option>
                    @endforeach
                    </select>
                    <div class="mb-2 col-12">
                    <p class="text-center">Mensaje:</p>
                        <input type="text" name="message" class="form-control" id="name"></input>
                    </div>
                    <div class="row justify-content-center">
                    <div class="mt-4 col-auto">
                        <input type="submit" class="btn btn-primary"></input>
                    </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

</html>
@endsection