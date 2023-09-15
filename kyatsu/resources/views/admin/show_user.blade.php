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
<p>{{$user["uuid"]}} </p> 
<p>{{$user["name"]}} </p>
<p>{{$user["email"]}} </p>
<p>{{$user["email_verified_at"]}} </p>
<p>{{$user["created_at"]}} </p>
<p>{{$user["updated_at"]}} </p>
<p>{{$user["deleted_at"]}} </p>
<p>{{$user["banned_at"]}} </p>

<p>Editar usuario:</p>
<a id="edit_user_url">Editar usuario</a>
@endsection