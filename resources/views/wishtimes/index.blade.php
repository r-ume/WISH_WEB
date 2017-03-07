@extends('app')

@section('content')
    <h1>WishTimes</h1>
    <h2>Wishtimesの一覧ページ</h2>

    {!! Form::model($wishtimes, ['method' => 'GET', 'url' => 'wishtimes/create']) !!}
        <button type="submit" class="btn btn-primary">Create a wish times</button>
    {!! Form::close() !!}

    @foreach($wishtimes as $wishtime)
        <a href = "{{action('WishtimesController@show', [$wishtime->id])}}"><h3>{{ $wishtime->id }} {{ $wishtime->title }}</h3></a>
        <h3>{{$wishtime->content}}</h3>
        <h4>Author: {{$wishtime->user->first_name}}</h4>
    @endforeach
@endsection