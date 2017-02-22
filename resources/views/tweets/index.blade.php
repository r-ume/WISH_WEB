@extends('app')

@section('content')
    <h1>Wish Tweet</h1>
    <h2>WISHに対して思うことをつぶやいてね！</h2>
    @foreach($tweets as $tweet)
        <a href = "{{action('TweetsController@show', [$tweet->id])}}"><li>{{$tweet->tweet}}</li></a>
    @endforeach
@endsection