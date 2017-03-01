@extends('app')

@section('content')
    <h1>Create page for tweets</h1>

    {!! Form::open(['url' => 'wishtimes']) !!}
        <div class = "form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class = "form-group">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        </div>

        <div class = "form-group">
            {!! Form::submit('make a new wishtimes', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection