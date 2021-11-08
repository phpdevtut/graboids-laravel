@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <h3 class="adminArticlesHeader">Articles</h3>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a class="addArticle" href="{{ route('admin.articles.new') }}">Add Article</a>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                        <tr>
                            <td>{{ $new->id }}</td>
                            <td>{{ $new->title }}</td>
                            <td>{{ $new->content }}</td>
                            <td>
                                <a href="{{ route('admin.news.edit', ['newsId' => $new->id]) }}" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

@endsection
