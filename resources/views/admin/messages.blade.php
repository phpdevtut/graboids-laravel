@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <h3 class="adminMessagesHeader">Messages</h3>

                <table class="table table-dark table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Subject</th>
                        <th scope="col">Message</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($messages as $message)
                        <tr>
                            <td>{{ $message->title }}</td>
                            <td>{{ $message->content }}</td>
                            <td>
                                <a href="{{ route('admin.messages.open', ['messageId' => $message->id]) }}" class="btn btn-warning">Open</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
