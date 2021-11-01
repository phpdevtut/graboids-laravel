@extends('layouts.main')

@section('content')
<div class="outer_form_div">
    <h4>You can contact us by filling out the form below:</h4>
    <div class="inner_form">
        <form action="/admin/emailToDatabase.php" method="POST">
            <div class="col-auto mb-3">
                <p>Email:</p>
                <input class="form-control" name="title">
            </div>
            <div class="col-auto mb-3">
                <p>Message:</p>
                <textarea  class="message_form" name="content"></textarea>
            </div>
            <div class="col-auto mb-3">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>

        </form>
    </div>
</div>
<div class="clear"></div>
@endsection