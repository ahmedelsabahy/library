<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">  <!--##########-->
    <title>@yield('title') </title>
</head>
<body>
    <div class="container py-4">  <!--py-4  يعني بادنج من فوق وتحت 5-->
        @yield('body')

    </div>



    <script src="{{ asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{ asset('js/bootstrap.js')}}"></script>

</body>
</html>