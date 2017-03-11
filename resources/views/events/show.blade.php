@extends('app')

@section('content')
    <h1>{{$event->title}}</h1>
    <h3>{{$event->description}}</h3>
    <span><img src="{{ asset($event->image) }}" /></span>


    {!! Form::model($event, ['method' => 'GET', 'url' => 'events/edit/'.$event->id]) !!}
    <button type="submit" class="btn btn-primary">edit</button>
    {!! Form::close() !!}

    {!! Form::model($event, ['method' => 'DELETE', 'url' => 'events/'.$event->id]) !!}
    <button type="submit" class="btn btn-danger"
            onclick = 'return confirm("Are you sure that you would like to delete the event?");'>delete</button>
    {!! Form::close() !!}

    @unless($event->categories->isEmpty())
        <h5>Categories: </h5>
        <ul>
            @foreach($event->categories as $category)
                <li>{{$category->name}}</li>
            @endforeach
        </ul>
    @endunless
@endsection