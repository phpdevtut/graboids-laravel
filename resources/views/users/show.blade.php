@extends('layouts.main')

@section('content')
    <div>
        {{ $user->name }}
        <form method="POST" action="{{ route('messages.store') }}">
            @csrf
            <input type="hidden" name="recipient_id" value="{{ $user->id }}">
            <textarea class="form-control" name="content"></textarea>
            <input class="form-control" type="submit">
        </form>
    </div>
@endsection
