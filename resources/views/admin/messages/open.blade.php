@extends('layouts.admin')

@section('content')
    <div>
        <a class="btn btn-danger" href="{{ route('messages.delete', ['messageId' => $message->id]) }}">Delete</a>
    </div>
    <div class="outer_form_div">
        <h4>Messages</h4>
        <div class="inner_form">
                {{ csrf_field() }}
            <p>Subject:</p>
                <div>
                    <p>{{ $message->title }}</p>
                </div>
            <p>Message:</p>
            <div>
                <p>{{ $message->content }}</p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
@endsection
