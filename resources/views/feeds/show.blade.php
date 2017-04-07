@extends('layouts.common')

@section('title', 'WISH_WEB feed' . $feed->title)

@include('layouts.head')

@include('layouts.header')

@section('content')
    <!-- Middle Content -->
    <div class="twelve wide column">
        @if($feed->user_id == $user->id)
            {!! Form::model($feed, ['method' => 'GET', 'url' => 'feeds/edit/'.$feed->title]) !!}
                <button type="submit" class="ui primary button">edit</button>
            {!! Form::close() !!}

            {!! Form::model($feed, ['method' => 'DELETE', 'url' => 'feeds/'.$feed->title]) !!}
                <button type="submit" class="red ui button"
                        onclick = 'return confirm("Are you sure that you would like to delete this wishtime?");'>delete</button>
            {!! Form::close() !!}
        @endif

        <div class="ui horizontal divider"><h2>{{ $feed->title }}</h2></div>

        <div align="center">
            <p>{{ $feed->content }}</p>
        </div>
        <br>
        <br>
    </div>
@endsection

@include('layouts.subbar')

@include('layouts.footer')