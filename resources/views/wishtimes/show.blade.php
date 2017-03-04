@extends('app')

@section('content')
    <h1>{{$wishtimes->title}}</h1>
    <h2>{{$wishtimes->content}}</h2>

    {!! Form::model($wishtimes, ['method' => 'GET', 'url' => 'wishtimes/edit/'.$wishtimes->id]) !!}
        <button type="submit" class="btn btn-primary">edit</button>
    {!! Form::close() !!}

    {!! Form::model($wishtimes, ['method' => 'DELETE', 'url' => 'wishtimes/'.$wishtimes->id]) !!}
        <button type="submit" class="btn btn-danger"
            onclick = 'return confirm("Are you sure that you would like to delete this circle?");'>delete</button>
    {!! Form::close() !!}
@endsection