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
                        <li><a href="{{ route('home')}}">Home</a></li>
                        <li><a href="{{ route('news.index')}}">News</a></li>
                        <li><a href="{{ route('hunters.index')}}">Hunters</a></li>
                        <li><a href="{{ route('upload.index')}}">Upload</a></li>
                        <li><a href="{{ route('about.index')}}">About</a></li>
                        <li><a href="{{ route('contact.index')}}">Contact</a></li>
                    </ul>
                </div>
                <div id="auth">
                    <div id="auth">
                        @include('shared.menu')
                    </div>
                </div>
            </div>
            <div>
                @include('shared.flash')
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="adminPanelList">
                        <div class="list-group">
                            <a href="{{ route('admin.hunters.index')}}" class="list-group-item list-group-item-action" aria-current="true">Hunters</a>
                            <a href="{{ route('admin.graboids.index')}}" class="list-group-item list-group-item-action">Graboids</a>
                            <a href="{{ route('admin.news.index')}}" class="list-group-item list-group-item-action">Articles</a>
                            <a href="{{ route('admin.users.index')}}" class="list-group-item list-group-item-action">Users</a>
                            @inject('messageService', 'App\Service\MessageService')
                            @if ($messageService->getUnreadMessagesCount())
                                <a href="{{ route('admin.messages.index')}}" class="list-group-item list-group-item-action">Messages <span class="badge bg-secondary">{{ $messageService->getUnreadMessagesCount() }}</span></a>
                            @else
                                <a href="{{ route('admin.messages.index')}}" class="list-group-item list-group-item-action">Messages</a>
                            @endif

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
