@extends('app')

@section('content')
    @foreach($tweets as $tweet)
        <a href = "{{action('TweetsController@show', [$tweet->id])}}">{{$tweet->id}}</a>
        <h1>{{$tweet->tweet}}</h1>
    @endforeach
@endsection