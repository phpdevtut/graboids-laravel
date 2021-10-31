@extends('layouts.main')

@section('content')
    <div class="outer_form_div">
        <h4>Edit a Hunter</h4>
        <div class="inner_form">
            <form action="/admin/hunters/{{ $hunter->id }}" method="POST">
                <div>
                    <img src="{{ $hunter->src }}" />
                </div>
                <div class="col-auto mb-3">
                    <p>src</p>
                    <input class="form-control" name="src" value="{{ $hunter->src }}">
                </div>
                <div class="col-auto mb-3">
                    <p>Hunter Name</p>
                    <input class="form-control" name="name" value="{{ $hunter->name }}">
                </div>
                <div class="col-auto mb-3">
                    <p>Hunter Description</p>
                    <textarea  class="message_form" name="description">
                        {{ $hunter->description }}
                    </textarea>
                </div>
                <div class="col-auto mb-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="clear"></div>
@endsection
