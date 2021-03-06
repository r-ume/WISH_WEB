@extends('layouts.common')

@section('title', 'WISH_WEB Create Event')

@include('layouts.head')

@include('layouts.header')

@section('content')
    <h1>Create page for events</h1>
        @if($errors->any())
            <ul class = "alert alert-danger">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

    {!! Form::open(['url' => 'events', 'files' => true, 'class' => 'ui form']) !!}
        <div class = "field">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['placeholder' => 'Title']) !!}
        </div>
        <div class = "field">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['placeholder' => 'Description']) !!}
        </div>
        <div class = "field">
            {!! Form::label('max_people', 'Max People:') !!}
            {!! Form::number('max_people', null) !!}
        </div>
        <div class = "field">
            {!! Form::label('start_at', 'Start At:') !!}
            {!! Form::input('start_at', null, \Carbon\Carbon::now(), ['name' => 'start_at']) !!}
        </div>
        <div class = "field">
            {!! Form::label('end_at', 'End At:') !!}
            {!! Form::input('end_at', null, \Carbon\Carbon::now(), ['name' => 'end_at']) !!}
        </div>
        <div class = "field">
            {!! Form::label('isAllDay', 'IsAllDay:') !!}
            {!! Form::checkbox('isAllDay', 1) !!}
        </div>
        <div class = "field">
            {!! Form::label('categories_list', 'Categories:') !!}
            {!! Form::select('categories_list[]', $pluckedCategories, null, ['id' => 'categories_list', 'multiple']) !!}
        </div>
        <div class = "field">
            {!! Form::label('image', '画像アップロード', ['class' => 'ui blue button']) !!}
            {!! Form::file('image') !!}
        </div>
        <div class = "field">
            {!! Form::label('users_list', 'Joiners:') !!}
            {!! Form::select('users_list[]', $users, null, ['id' => 'users_list', 'multiple']) !!}
        </div>
        <div class = "field">
            {!! Form::submit('make a new event', ['class' => 'ui blue button']) !!}
        </div>
    {!! Form::close() !!}

    <br />
@endsection

@include('layouts.subbar')

@include('layouts.footer')