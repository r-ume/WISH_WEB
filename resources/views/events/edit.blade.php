@extends('layouts.common')

@section('title', 'WISH_WEB Event '. $event->title)

@include('layouts.head')

@include('layouts.header')

@section('content')
    <div class = "ui form">
        <h1>Edit the events: {{$event->name}}</h1>

        @if($errors->any())
            <ul class = "alert alert-danger">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->id]]) !!}
            <div class = "field">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', $event->title) !!}
            </div>
            <div class = "field">
                {!! Form::label('Description', 'Description:') !!}
                {!! Form::textarea('description', $event->description) !!}
            </div>
            <div class = "field">
                {!! Form::label('max_people', 'Max People:') !!}
                {!! Form::number('max_people', $event->max_people) !!}
            </div>
            <div class = "field">
                {!! Form::label('start_at', 'Start At:') !!}
                {!! Form::input('start_at', null, date('Y-m-d H:m:s', $event->start_at), ['name' => 'start_at']) !!}
            </div>
            <div class = "field">
                {!! Form::label('end_at', 'End At:') !!}
                {!! Form::input('end_at', null, date('Y-m-d H:m:s', $event->end_at), ['name' => 'end_at']) !!}
            </div>
            <div class = "field">
                {!! Form::label('isAllDay', 'IsAllDay:') !!}
                {!! Form::checkbox('isAllDay', 1) !!}
            </div>
            <div class = "field">
                {!! Form::label('categories_list', 'Categories:') !!}
                {!! Form::select('categories_list[]', $categories, null, ['id' => 'categories_list', 'multiple']) !!}
            </div>
            <div class = "field">
                {!! Form::label('image', '画像アップロード', ['class' => 'ui blue button']) !!}
                    @if($event->image) {{ asset($event->image) }} @endif
                {!! Form::file('image') !!}
            </div>
            <div class = "field">
                {!! Form::label('users_list', 'Joiners:') !!}
                {!! Form::select('users_list[]', $users, null, ['id' => 'users_list', 'multiple']) !!}
            </div>
            <div class = "field">
                {!! Form::submit('Edit the events', ['class' => 'ui blue button']) !!}
            </div>
        {!! Form::close() !!}
    </div>

    <br />
@endsection

@include('layouts.subbar')

@include('layouts.footer')