@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <h3>Graboids</h3>

                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($graboids as $graboid)
                        <tr>
                            <td>{{ $graboid->id }}</td>
                            <td>{{ $graboid->src }}</td>
                            <td>
                                <a href="{{ route('admin.graboids.edit', ['graboidId' => $graboid->id]) }}" class="btn btn-warning">Edit</a>
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
