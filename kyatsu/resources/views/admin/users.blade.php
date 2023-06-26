@extends("admin.admintemplate")

@section("http_headers")
<script id="http_data_paginator" type="application/json">
    <?php echo (json_encode(["name" => "A", "page" => 1, "method" => "name", "order" => "DESC"])); ?>
</script>
<script id="route_generator_paginator">
    getRoute = (function($name, $page = 1, $order = "DESC", $method = "NAME",) {
      return route("admin.admin_users.index", {
        name: $name,
        page: $page ?? 1,
        order: $order ?? "DESC",
        method: $method ?? "name",
      });
    });
</script>
<script src="{{url('js/build/user_paginator.js')}}"></script>
<script src="{{url('js/build/admin_paginator.js')}}"></script>
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