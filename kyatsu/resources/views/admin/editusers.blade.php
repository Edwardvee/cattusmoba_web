@extends("admin.admintemplate")

@section("http_headers")
<script type="text/javascript">
    $(document).ready(() => {
        $("#edit_user_url").attr("href", route("admin.admin_users.edit", {
            admin_user: "{{$user['uuid']}}"
        }))
    });
</script>

@endsection
@section("http_body")
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
@endif
    <div class="card">
        <div class="card-body">
            <form method="POST" , action="{{route('admin.admin_users.update', ['admin_user' => $user['uuid']])}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="mb-2 col-12">
                    <p class="text-center">UUID:</p>
                        <input type="text" name="uuid" class="form-control" id="uuid" readonly value="{{$user['uuid']}}"></input>
                    </div>
                    <div class="mb-2 col-12">
                    <p class="text-center">E-mail:</p>

                        <input type="email" name="email" class="form-control" id="email" value="{{$user['email']}}"></input>
                    </div>
                    <div class="mb-2 col-12">
                    <p class="text-center">Nombre de usuario:</p>
                        <input type="text" name="name" class="form-control" id="name" value="{{$user['name']}}"></input>
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




    @endsection
    <!DOCTYPE html>