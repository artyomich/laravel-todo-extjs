<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ToDo App</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/extjs/6.0.0/classic/theme-crisp/resources/theme-crisp-all.css">
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/style.css') !!}

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


</head>
<body>


    <div class="container">
        @yield('content')
    </div>



</body>
</html>