@extends('app')

@section('content')
    <h1>Create page for wishtimes</h1>

    @if($errors->any())
        <ul class = "alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

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
            {!! Form::label('categories_list', 'Categories:') !!}
            {!! Form::select('categories_list[]', $categories, null, ['class' => 'form-control', 'multiple']) !!}
        </div>

        <div class = "form-group">
            {!! Form::submit('make a new wishtimes', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection
