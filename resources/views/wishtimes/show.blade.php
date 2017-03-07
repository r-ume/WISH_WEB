@extends('app')

@section('content')
    <h1>{{$wishtimes->title}}</h1>
    <h2>{{$wishtimes->content}}</h2>
    <span><img src="{{ asset($wishtimes->image) }}" /></span>

    {!! Form::model($wishtimes, ['method' => 'GET', 'url' => 'wishtimes/edit/'.$wishtimes->id]) !!}
        <button type="submit" class="btn btn-primary">edit</button>
    {!! Form::close() !!}

    {!! Form::model($wishtimes, ['method' => 'DELETE', 'url' => 'wishtimes/'.$wishtimes->id]) !!}
        <button type="submit" class="btn btn-danger"
            onclick = 'return confirm("Are you sure that you would like to delete this circle?");'>delete</button>
    {!! Form::close() !!}

    @unless($wishtimes->categories->isEmpty())
        <h5>Categories: </h5>
        <ul>
            @foreach($wishtimes->categories as $category)
                <li>{{$category->name}}</li>
            @endforeach
        </ul>
    @endunless
@endsection