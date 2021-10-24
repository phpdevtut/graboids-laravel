@extends('layouts.main')

@section('content')
    <div class=big-card style="width: 25rem;">
        @if (isset($_SESSION['is_admin']))
            <div>
                <a class="btn btn-danger" href="/graboids/{{ $graboid->id }}/delete">Delete</a>
            </div>
        @endif
        <div class="card-image">
            <img src="{{ $graboid->src }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="big-card-title">test</h5>
            <p class="big-card-text">test</p>
        </div>
        <hr>
        <div>
            <form action="/graboids/{{ $graboid->id }}/comments" method="POST">
                <textarea class="form-control" name="comment">

                </textarea>
                <button class="btn btn-primary" type="submit">Post</button>
            </form>
        </div>
        <hr>
        <div class="comments">
            <p>Number of comments: {{ $graboid->comments()->count() }}</p>
            @foreach($graboid->comments as $comment)
                <p>{{ $comment->comment }}</p>
            @endforeach
        </div>
    </div>
@endsection
