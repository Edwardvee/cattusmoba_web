@extends("admin.admintemplate")

@section("http_headers")
<script src="{{url('js/build/user_paginator.js')}}"></script>
<script src="{{url('js/build/admin_paginator.js')}}"></script>
<script type="text/javascript">
  $(document).ready(() => {
    window.ADMIN_PAGINATOR = new AdministrablePaginator();
    window.ADMIN_PAGINATOR.information.name = window.ADMIN_PAGINATOR.information.name;
  });
</script>

@endsection
@section("http_body")
<br>
<br>
<br>
<br>
<br>
<div id="paginator_admin">
</div>
@endsection