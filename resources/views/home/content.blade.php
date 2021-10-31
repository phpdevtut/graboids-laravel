{{--//searches view/layouts/main.blade.php for blade queries--}}
{{--//Does this basically open layouts.main so it also gets echoed?--}}
@extends('layouts.main')

@section('content')
    @if (!empty($_SESSION['message']))
        <div class="alert alert-warning" role="alert">
            // TODO
        </div>
    @endif
    <div class="myGallery">
        @foreach ($graboids->chunk(5) as $graboidsChunk)
            <div class="imgWrapper">
                @foreach ($graboidsChunk as $graboid)
                    <a href="{{ route('home.show', ['graboidId' => $graboid->id]) }}">
                        <img class="img-thumbnail rounded float-start" src="{{ $graboid->src }}" />
                    </a>
                @endforeach
            </div>
        @endforeach
    </div>
    <div class="clear"></div>
@endsection

