@extends('layouts.common')

@section('title', 'WISH_WEB Create Feed')

@include('layouts.head')

@include('layouts.header')

@section('content')
    <!-- Middle Content -->
    <div class="twelve wide column">
        <h1>Create page for feeds</h1>
        @if($errors->any())
            <ul class = "alert alert-danger">
                @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['url' => 'feeds', 'files' => true, 'class' => 'ui form']) !!}
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
                {!! Form::submit('make a new feeds', ['class' => 'ui blue button']) !!}
            </div>
        {!! Form::close() !!}
        <br />
    </div>
@endsection

@include('layouts.subbar')

@include('layouts.footer')