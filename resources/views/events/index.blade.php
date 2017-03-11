@extends('app')

@section('content')
    <h1>Events</h1>
    <h3>Eventsの一覧ページ</h3>

    {!! Form::model($events, ['method' => 'GET', 'url' => 'events/create']) !!}
    <button type="submit" class="btn btn-primary">Create an event</button>
    {!! Form::close() !!}

    @foreach($events as $event)
        <a href = "{{action('EventsController@show', [$event->id])}}"><h3> {{ $event->title }} </h3></a>
        <h3>{{$event->description}}</h3>
    @endforeach
@endsection