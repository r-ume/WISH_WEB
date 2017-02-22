@extends('app')

@section('content')
    <h1>Create page for tweets</h1>

    {!! Form::open(['url' => 'tweets']) !!}
        <div class = "form-group">
            {!! Form::label('tweet', 'Tweet:') !!}
            {!! Form::text('tweet', null, ['class' => 'form-control']) !!}
        </div>

        <div class = "form-group">
            {!! Form::submit('make a new tweet', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection
