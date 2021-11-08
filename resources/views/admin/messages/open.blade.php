@extends('layouts.main')

@section('content')
    <div class="outer_form_div">
        <h4>Edit a Hunter</h4>
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
