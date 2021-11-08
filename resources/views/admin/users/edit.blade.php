@extends('layouts.main')

@section('content')
    <div class="outer_form_div">
        <h4>Edit a User</h4>
        <div class="inner_form">
            <form action="{{ route('admin.users.update', ['userId' => $user->id]) }}" method="POST">

                <div class="col-auto mb-3">
                    <p>Name</p>
                    <input class="form-control" name="src" value="{{ $user->name }}">
                </div>
                <div class="col-auto mb-3">
                    <p>email</p>
                    <input class="form-control" name="name" value="{{ $user->email }}">
                </div>
                <div class="col-auto mb-3">
                    <p>Are you an Admin?</p>
                    <textarea  class="message_form" name="admin">
                        {{ $user->admin }}
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
