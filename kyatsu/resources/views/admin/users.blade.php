@extends("admin.admintemplate")

@section("http_headers")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="{{url('css/paginator.css')}}" /> 
<!--<script type="module" src="{{url('js/build/user_paginator.js')}}"></script>-->
<!--<script id="ADMIN_PAGINATOR" type="module" src="{{url('js/build/admin_paginator.js')}}"></script>-->
<script type="text/javascript">
  $(document).ready(() => {
    window.moment = moment;
    import("{{url('js/build/admin_paginator.js')}}").then((success) => {
        window.ADMIN_PAGINATOR = new success.AdministrablePaginator();
        window.ADMIN_PAGINATOR.information.name = window.ADMIN_PAGINATOR.information.name;
      }
    ).catch((error) => {
      console.warn(error);
      Swal.fire({
        title: "Error",
        text: "Ha ocurrido un fallo al cargar el paginador. La seccion actual se encuentra fuera de linea",
        icon: "error",
        allowOutsideClick: false,
        showConfirmButton: false,
      });
    })
  });
</script>

@endsection
@section("http_body")
<br>
<br>
<br>
<br>
<br>
<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>

<div id="paginator_admin">
</div>
@endsection