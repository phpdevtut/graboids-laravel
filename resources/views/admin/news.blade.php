@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-4">
                <div class="adminPanelList">
                    <div class="list-group">
                        <a href="/admin/hunters" class="list-group-item list-group-item-action">Hunters</a>
                        <a href="/admin/add-article" class="list-group-item list-group-item-action active" aria-current="true">
                            Add An Article</a>
                        <a href="/admin/add-hunter" class="list-group-item list-group-item-action">Add Hunter</a>
                        <a href="#" class="list-group-item list-group-item-action">Edit Hunters</a>
                        <a href="#" class="list-group-item list-group-item-action">Edit Users</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Edit Comments</a>
                    </div>
                </div>
            </div>
            <div class="col col-8">
                <div>
                    <h1><Hunters></Hunters></h1>
                    <table class="table table-dark table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
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
