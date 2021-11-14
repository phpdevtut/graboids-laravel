@extends('layouts.main')

@section('content')
    <div class="about">
        <h2>{{ $about->title }}</h2>
        <p>{{ $about->content }}</p>
    </div>
    <div class="clear"></div>
@endsection
