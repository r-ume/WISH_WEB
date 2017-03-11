@extends('app')

@section('content')
    <h1>Create page for events</h1>

    @if($errors->any())
        <ul class = "alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url' => 'events', 'files' => true]) !!}
    <div class = "form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('description', 'Description:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('categories_list', 'Categories:') !!}
        {!! Form::select('categories_list[]', $categories, null, ['id' => 'categories_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

    <div class = "form-group">
        {!! Form::label('image', '画像アップロード', ['class' => 'control-label']) !!}
        {!! Form::file('image') !!}
    </div>

    <div class = "form-group">
        {!! Form::submit('make a new event', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection


@section('footer')
    <script>
        $('#categories_list').select2();
    </script>
@endsection