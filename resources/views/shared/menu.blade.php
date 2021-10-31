@if (auth()->user())
    <div id="menubuttons">
        <ul>
            @if (auth()->user()->admin)
                <li>
                    <a class="btn btn-primary" href="/admin">admin</a>
                </li>
            @endif
            <li>
                <a class="btn btn-primary" href="/logout">Logout</a>
            </li>
        </ul>
    </div>
@else
    <div class="col-auto mb-3">
        <button class="btn btn-primary" type="submit"><a href="/login">Login</a></button>
    </div>
@endif
