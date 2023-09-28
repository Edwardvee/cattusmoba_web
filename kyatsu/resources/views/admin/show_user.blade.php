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
<div class="container-fluid">
<link rel="stylesheet" href="{{url('css/usershow.css')}}">
    <div class="card">
        <div class="card-body">
        <div class="bg">
            <p>ID: {{$user["uuid"]}} </p>
            <p>Nombre de usuario: {{$user["name"]}} </p>
            <p>Direccion de correo electronico: {{$user["email"]}} </p>
            <p>Fecha de verificación: {{$user["email_verified_at"]}} </p>
            <p>Creado en: {{$user["created_at"]}} </p>
            <p>Ultima actualización: {{$user["updated_at"]}} </p>
            <p>Fecha de eliminación: {{$user["deleted_at"]}} </p>
            <p>Fecha de bloqueo: {{$user["banned_at"]}} </p>
            <div class="row">
                <div class="col-auto me-auto">
                <a class="btn btn-primary" id="edit_user_url">Editar este usuario</a>
                </div>
                <div class="col-auto">
                <a class="btn btn-danger" id="edit_user_url"><i class="bi bi-trash"></i></a>
                </div>
                </div>  
            </div>
        </div>
    </div>




    @endsection