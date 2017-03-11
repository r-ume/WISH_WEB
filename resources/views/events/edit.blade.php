@extends('app')

@section('content')

    <h1>Edit the times: {{$event->title}}</h1>

    <br/>

    @if($errors->any())
        <ul class = "alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->id]]) !!}
    <div class = "form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', $event->title, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', $event->description, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('categories_list', 'Categories:') !!}
        {!! Form::select('categories_list[]', $categories, null, ['id' => 'categories_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

    <div class = "form-group">
        {!! Form::submit('Edit this existing event', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection

@section('footer')
    <script>
        $('#categories_list').select2({
            placeholder: 'choose a category'
        });
    </script>
@endsection