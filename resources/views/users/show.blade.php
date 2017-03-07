@extends('app')

@section('content')
    <h1>Welcome! {{$user->first_name}}</h1>

    <h4>floor {{$user->floor}}</h4>

    <img src="{{ asset($user->image) }}" />

@endsection