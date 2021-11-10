@extends('layouts.main')

@section('content')
    <div class="outer_form_div">
        <h4>Edit a Hunter</h4>
        <div class="inner_form">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.hunters.update', ['hunterId' => $hunter->id]) }}" method="POST">
                {{ csrf_field() }}
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
