@extends('layouts.profile')

@section('content')
    <h3>My chats:</h3>
    @foreach($messages as $message)
        <div class="message">
            <h6>{{ $message->author->name }}</h6>
            <p>{{ $message->content }}</p>
            <a href="{{ route('messages.chat', ['authorId' => $message->author->id]) }}">Go to chat</a>
        </div>
        <hr/>
    @endforeach
@endsection
