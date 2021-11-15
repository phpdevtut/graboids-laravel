@extends('layouts.main')

@section('content')
    <div class=big-card style="width: 25rem;">
        @if (auth()->user() == NULL or !auth()->user()->admin)
        @elseif (auth()->user()->admin)
            <div>
                <a class="btn btn-danger" href="{{ route('hunters.delete', ['hunterId' => $hunter->id]) }}">Delete</a>
            </div>
        @endif
        <div class="card-image">
        <img src="{{ $hunter->src }}" class="card-img-top" alt="...">
        </div>
        <div class="card-body">
            <h5 class="big-card-title">{{ $hunter->name }}</h5>
            <p class="big-card-text">{{ $hunter->description }}</p>
        </div>
        <hr>
            <div>
                <form action="{{ route('hunters.comments.store', ['hunterId' => $hunter->id]) }}" method="POST">
                    @csrf
                    <textarea class="form-control" name="comment"></textarea>
                    <button class="btn btn-primary" type="submit">Post</button>
                </form>
            </div>
            <hr>
            <div class="comments">
                <p>Number of comments: {{ $hunter->comments()->count() }}</p>
                @foreach($hunter->comments as $comment)
                    <div class="comment_block">
                        <h6>{{ $comment->user->name }}</h6>
                        <p>{{ $comment->comment }}</p>
                        <small>{{ $comment->created_at->toDayDateTimeString() }}</small>
                    </div>
                @endforeach
            </div>

@endsection
