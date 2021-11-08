@extends('layouts.main')

@section('content')
    <div class="about">
        @foreach ($about as $about)
    <h2>{{ $about->title }}</h2>
    <p>{{ $about->content }}</p>
        @endforeach
    </div>
    <div class="clear"></div>
@endsection
