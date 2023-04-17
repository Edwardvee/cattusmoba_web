<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @routes(url("ziggy/frontend.js"))
    <script id="http_data_paginator" type="application/json">
        <?php echo (json_encode(["name" => $name, "page" => $page])); ?>
    </script>
    <script id="route_generator_paginator">
        getRoute = (function($name, $page) {
            return route("user", {
                name: $name,
                page: $page
            });
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{url('js/user_paginator.js')}}" autorun="true"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script>
</script>

<body>
    <div id="paginator">
    </div>
</body>

</html>