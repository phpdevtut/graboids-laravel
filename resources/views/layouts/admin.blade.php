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
                        <li><a href="/news">News</a></li>
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

            <div class="row">
                <div class="col-3">
                    <div class="adminPanelList">
                        <div class="list-group">
                            <a href="/admin/hunters" class="list-group-item list-group-item-action">Hunters</a>
                            <a href="/admin/add-article" class="list-group-item list-group-item-action" aria-current="true">
                                Add An Article</a>
                            <a href="/admin/add-hunter" class="list-group-item list-group-item-action">Add Hunter</a>
                            <a href="#" class="list-group-item list-group-item-action">Edit Hunters</a>
                            <a href="#" class="list-group-item list-group-item-action">Edit Users</a>
                            <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Edit Comments</a>
                        </div>
                    </div>
                </div>
                <div class="col-9">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>
