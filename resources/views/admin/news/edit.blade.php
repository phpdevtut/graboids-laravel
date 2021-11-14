@extends('layouts.admin')

@section('content')
    <div class="outer_form_div">
        <h4>Edit an Article</h4>
        <div class="inner_form">

            <form action="{{ route('admin.news.update', ['newsId' => $new->id]) }}" method="POST">

                {{ csrf_field() }}
                <div class="col-auto mb-3">
                    <p>ID</p>
                    <input class="form-control" name="id" value="{{ $new->id }}">
                </div>
                <div class="col-auto mb-3">
                    <p>title</p>
                    <input class="form-control" name="title" value="{{ $new->title }}">
                </div>
                <div class="col-auto mb-3">
                    <p>content</p>
                    <textarea  class="message_form" name="content">
                        {{ $new->content }}
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
