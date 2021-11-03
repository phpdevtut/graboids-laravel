@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <h3 class="adminhuntersheader">Hunters</h3>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <a class="addhunter" href="{{ route('admin.hunter.new') }}">Add Hunter</a>
                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hunters as $hunter)
                        <tr>
                            <td>{{ $hunter->id }}</td>
                            <td>{{ $hunter->name }}</td>
                            <td>
                                <a href="/admin/hunters/{{ $hunter->id }}/edit" class="btn btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
