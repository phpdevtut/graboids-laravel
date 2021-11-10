@extends('layouts.admin')

@section('content')
    <h3>Profile</h3>
    <p>Hello, {{auth()->user()->name}}!</p>
    <p>Name: {{auth()->user()->name}}</p>
    <p>Registered E-Mail: {{auth()->user()->email}}</p>
    <p>Registration Date: {{auth()->user()->created_at}}</p>
@endsection
