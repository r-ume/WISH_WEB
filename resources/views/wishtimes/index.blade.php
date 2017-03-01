@extends('app')

@section('content')
    <h1>WishTimes</h1>
    <h2>Wishtimesの一覧ページ</h2>
    @foreach($wishtimes as $wishtime)
        <a href = "{{action('WishtimesController@show', [$wishtime->id])}}"><h3>{{$wishtime->title}}</h3></a>
        <h3>{{$wishtime->content}}</h3>
        <h4>Author: {{$wishtime->user->first_name}}</h4>
    @endforeach
@endsection