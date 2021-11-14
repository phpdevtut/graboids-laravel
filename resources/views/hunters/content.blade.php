@extends('layouts.main')

@section('content')
    <div class="card-group">
    @foreach ($hunters as $hunter)
        <div class="card" style="width: 18rem;">
            <img src="{{ $hunter['src'] }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$hunter['name']}}</h5>
                <p class="card-text">{{$hunter['description']}}</p>
                <div class="col-auto mb-3">
                    <button class="btn btn-primary" type="submit">
                        <a href="{{ route('hunters.show', ['hunterId' => $hunter->id]) }}">
                            Go to hunters profile</a>
                    </button>
                </div>

                @if (auth()->user() == NULL or !auth()->user()->admin)
                @elseif (auth()->user()->admin)
                    <div>
                        <a class="btn btn-danger" href="/hunters/{{ $hunter['id'] }}/delete">Delete</a>
                    </div>
                @endif
            </div>

        </div>
    @endforeach
    </div>
    <div class="clear"></div>
@endsection
