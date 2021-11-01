@extends('layouts.admin')

@section('content')
<div class="outer_form_div">
    <h2>Add new article</h2>
    <div class="inner_form">
        <form action="/admin/saveNewArticle.php" method="POST">
            <p>Title:</p>
                <div name="title" class="col-auto mb-3">
                    <input class="form-control" name="title">
                </div>
            <p>Content:</p>
                <div class="col-auto mb-3">
                    <textarea class="message_form form-control"  name="content"></textarea>
                </div>
            <div class="col-auto mb-3">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<div class="clear"></div>
@endsection
