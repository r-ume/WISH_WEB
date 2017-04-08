@extends('layouts.common')

@section('title', 'WISH_WEB Wishtimes '. $wishtimes->title)

@include('layouts.head')

@include('layouts.header')

@section('content')
    <div class = "ui form">
        <h1>Edit the wishtimes: {{$wishtimes->name}}</h1>

        @if($errors->any())
            <ul class = "alert alert-danger">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($wishtimes, ['method' => 'PATCH', 'action' => ['WishtimesController@update', $wishtimes->title]]) !!}
            <div class = "field">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', $wishtimes->title) !!}
            </div>
            <div class = "field">
                {!! Form::label('content', 'Content:') !!}
                {!! Form::textarea('content', $wishtimes->content) !!}
            </div>
            <div class = "field">
                {!! Form::label('categories_list', 'Categories:') !!}
                {!! Form::select('categories_list[]', $listedCategories, null, ['id' => 'categories_list', 'multiple']) !!}
            </div>
            <div class = "field">
                {!! Form::label('image', '画像アップロード', ['class' => 'ui blue button']) !!}
                {!! Form::file('image') !!}
            </div>
            <div class = "field">
                {!! Form::submit('Edit the wishtimes', ['class' => 'ui blue button']) !!}
            </div>
        {!! Form::close() !!}
    </div>
    <br />
@endsection

@include('layouts.footer')