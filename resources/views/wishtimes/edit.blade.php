@extends('app')

@section('content')

    <h1>Edit the times: {{$wishtimes->name}}</h1>

    <br/>

    {!! Form::model($wishtimes, ['method' => 'PATCH', 'action' => ['WishtimesController@update', $wishtimes->id]]) !!}
    <div class = "form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', $wishtimes->title, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('content', 'Content:') !!}
        {!! Form::textarea('content', $wishtimes->content, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::submit('Edit this existing article', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

@endsection