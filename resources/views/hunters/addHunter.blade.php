@extends('layouts.admin')

@section('content')
    <div class="outer_form_div">
        <h4>Add a Hunter</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="inner_form">
            <form action="{{ route('admin.hunters.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-auto mb-3">
                    <p>src</p>
                    <input class="form-control" name="src">
                </div>
                <div class="col-auto mb-3">
                    <p>Hunter Name</p>
                    <input class="form-control" name="name">
                </div>
                <div class="col-auto mb-3">
                    <p>Hunter Description</p>
                    <textarea  class="message_form" name="description"></textarea>
                </div>
                <div class="col-auto mb-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="clear"></div>
@endsection
