@extends('layouts.common')

@section('title', 'WISH_WEB Event '. $feed->title)

@include('layouts.head')

@include('layouts.header')

@section('content')
    <div class = "ui form">
        <h1>Edit the feed: {{$feed->name}}</h1>

    @if($errors->any())
        <ul class = "alert alert-danger">
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($feed, ['method' => 'PATCH', 'action' => ['FeedsController@update', $feed->title]]) !!}
        <div class = "field">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', $feed->title) !!}
        </div>

        <div class = "field">
            {!! Form::label('content', 'Content:') !!}
            {!! Form::textarea('content', $feed->content) !!}
        </div>

        <div class = "field">
            {!! Form::label('categories_list', 'Categories:') !!}
            {!! Form::select('categories_list[]', $listedCategories, null, ['id' => 'categories_list', 'multiple']) !!}
        </div>

        <div class = "field">
            {!! Form::submit('Edit the feeds', ['class' => 'ui blue button']) !!}
        </div>
        <br/>
    {!! Form::close() !!}
    </div>
@endsection

@include('layouts.subbar')

@include('layouts.footer')