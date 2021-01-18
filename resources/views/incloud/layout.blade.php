<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <title>@yield('title') </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('books.index') }}">books <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">category</a>
                </li>
                @guest

                    <li class="nav-item nav justify-content-end" style="">
                        <a class="nav-link" href="{{ route('auther.register') }}">register</a>
                    </li>
                    <li class="nav-item " style="">
                        <a class="nav-link" href="{{ route('auther.login') }}">login</a>
                    </li>
                @endguest

                @auth
                <li class="nav-item ">
                    <a class="nav-link disable" href="#">{{Auth::user()->name}}</a>
                </li>
                    <li class="nav-item " style="">
                        <a class="nav-link" href="{{ route('auther.logout') }}">logout</a>
                    </li>
                @endauth

            </ul>
        </div>
    </nav>
    <div class="container py-4">
        <!--py-4  يعني بادنج من فوق وتحت 5-->
        @yield('body')

    </div>


</body>

</html>
