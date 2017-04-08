@extends('layouts.common')

@section('title', 'WISH_WEB Create Wishtimes')

@include('layouts.head')

@include('layouts.header')

@section('content')
    <!-- Middle Content -->
        <h1>Create page for wishtimes</h1>
        @if($errors->any())
            <ul class = "alert alert-danger">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'wishtimes', 'files' => true, 'class' => 'ui form']) !!}
            <div class = "field">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['placeholder' => 'Title']) !!}
            </div>
            <div class = "field">
                {!! Form::label('content', 'Content:') !!}
                {!! Form::textarea('content', null, ['placeholder' => 'Content']) !!}
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
                {!! Form::submit('make a new wishtimes', ['class' => 'ui blue button']) !!}
            </div>
            <br />
        {!! Form::close() !!}
@endsection

@include('layouts.footer')