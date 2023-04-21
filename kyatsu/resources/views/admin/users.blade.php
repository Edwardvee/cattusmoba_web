@extends("admin.admintemplate")

@section("http_body")
<p>
@php

    print_r($users)
@endphp
</p>
@endsection