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
    <div class="card">
        <div class="card-body">
            <form method="POST" , action="{{route('admin.admin_users.update', ['admin_user' => $user['uuid']])}}">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="mb-2 col-12">
                    <p class="text-center">UUID:</p>
                        <input type="text" class="form-control" id="uuid" readonly placeholder="{{$user['uuid']}}" disabled></input>
                    </div>
                    <div class="mb-2 col-12">
                    <p class="text-center">E-mail:</p>

                        <input type="email" class="form-control" id="email" value="{{$user['email']}}"></input>
                    </div>
                    <div class="mb-2 col-12">
                    <p class="text-center">Nombre de usuario:</p>
                        <input type="text" class="form-control" id="name" value="{{$user['name']}}"></input>
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