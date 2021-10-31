<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="/style.css?version=111" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrapper" class="container">
            <div id="header">
                <a href="/"><img id="logo" src="/assets/images/Tremors_Logo_Sm.png"/></a>
                <div id="menu">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ route('news.index') }}">News</a></li>
                        <li><a href="/hunters">Hunters</a></li>
                        <li><a href="/upload">Upload</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div id="auth">
                    @if (isset($_SESSION['user_id']))
                        <div id="menubuttons">
                            <ul>
                                <li>
                                    <a class="btn btn-primary" href="/admin">admin</a>
                                </li>
                                <li>
                                    <a class="btn btn-primary" href="/logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    @else
                        <div class="col-auto mb-3">
                            <button class="btn btn-primary" type="submit"><a href="/login">Login</a></button>
                        </div>

{{--                        <a class="btn btn-primary" href="/admin/logout.php">logout</a>
                    @else
                        <a class="btn btn-primary" href="/admin/login.php">Login</a>--}}
                    @endif
                </div>
            </div>
            <div class="alert"><p style="color:red">Graboid alert!!!</p></div>
            @if (!empty($user))
                <div class="alert">
                    <p>Hello, {{ $user->username }}</p>
                </div>
            @endif
            <div id="content">
            {{--            content.blade.php searches for this, and replaces it with divs inside file.--}}

            <!--
                 Here we had %content% as a pointer on where we want to embed a view
                 -->
                @yield('content')
            </div>
        </div>
    </body>
</html>
