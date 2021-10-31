@extends('layouts.main')

@section('content')
    <div class="outer_form_div">
        <h4>Edit a Graboid</h4>
        <div class="inner_form">
            <form action="/admin/graboids/{{ $graboid->id }}" method="POST">
                <div>
                    <img class="img-thumbnail rounded float-start" src="{{ $graboid->src }}" />
                </div>
                <div class="col-auto mb-3">
                    <p>src</p>
                    <input class="form-control" name="src" value="{{ $graboid->src }}">
                </div>
                <div class="col-auto mb-3">
                    <p>Graboid ID</p>
                    <input class="form-control" name="name" value="{{ $graboid->id }}">
                </div>
                <div class="col-auto mb-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="clear"></div>
@endsection
