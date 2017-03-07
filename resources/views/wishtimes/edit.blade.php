@extends('app')

@section('content')

    <h1>Edit the times: {{$wishtimes->name}}</h1>

    <br/>

    @if($errors->any())
        <ul class = "alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

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
        {!! Form::label('categories_list', 'Categories:') !!}
        {!! Form::select('categories_list[]', $categories, null, ['id' => 'categories_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

    <div class = "form-group">
        {!! Form::submit('Edit this existing article', ['class' => 'btn btn-primary form-control']) !!}
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