@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <h3 class="adminarticlesheader">Articles</h3>
                <a class="addarticle" href="/admin/add-article">Add Article</a>
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
                                <a href="/admin/news/{{ $new->id }}/edit" class="btn btn-warning">Edit</a>
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
