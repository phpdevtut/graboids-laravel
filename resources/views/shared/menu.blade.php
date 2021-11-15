@if (auth()->user())
    <div id="menubuttons">
        <ul>
            @if (auth()->user()->admin)
                <li>
                    <a class="btn btn-primary" href="{{ route('admin.index') }}">admin</a>
                </li>
            @else
                <li>
                    <a class="btn btn-primary" href="{{ route('profile.show') }}">profile</a>
                </li>
            @endif
            <li>
                <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
@else
    <div class="col-auto mb-3">
        <button class="btn btn-primary" type="submit"><a href="{{ route('login') }}">Login</a></button>
    </div>
@endif
