@extends('layouts.main')

@section('content')
    <div class=big-card style="width: 25rem;">
        @if (auth()->user() == NULL or !auth()->user()->admin)
        @elseif (auth()->user()->admin)
            <div>
                <a class="btn btn-danger" href="{{ route('graboids.delete', ['graboidId' => $graboid->id]) }}">Delete</a>
            </div>
        @endif
        <div class="card-image">
            <img src="{{ asset($graboid->src)  }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="big-card-title">test</h5>
            <p class="big-card-text">test</p>
        </div>
        <hr>
        <div>
            <form action="{{ route('graboids.comments.store', ['graboidId' => $graboid->id]) }}" method="POST">
                @csrf
                <textarea class="form-control" name="comment"></textarea>
                <button class="btn btn-primary" type="submit">Post</button>
            </form>
        </div>
        <hr>
        <div class="comments">
            <p>Number of comments: {{ $graboid->comments()->count() }}</p>
            @foreach($graboid->comments as $comment)
                <div class="comment_block">
                    <a href="{{ route('users.show', ['userId' => $comment->user->id]) }}"><h6>{{ $comment->user->name }}</h6></a>
                    <p>{{ $comment->comment }}</p>
                    <small>{{ $comment->created_at->toDayDateTimeString() }}</small>
                </div>
            @endforeach
        </div>
    </div>
@endsection
