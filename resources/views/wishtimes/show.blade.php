@extends('layouts.common')

@section('title', 'WISH_WEB' . $wishtimes->title)

@include('layouts.head')

@include('layouts.header')

@section('content')
    <!-- Middle Content -->
    <div class="twelve wide column">
        @if($wishtimes->user_id == $user->id)
            {!! Form::model($wishtimes, ['method' => 'GET', 'url' => 'wishtimes/edit/'.$wishtimes->title]) !!}
            <button type="submit" class="ui primary button">edit</button>
            {!! Form::close() !!}

            {!! Form::model($wishtimes, ['method' => 'DELETE', 'url' => 'wishtimes/'.$wishtimes->title]) !!}
            <button type="submit" class="red ui button"
                    onclick = 'return confirm("Are you sure that you would like to delete this wishtime?");'>delete</button>
            {!! Form::close() !!}
        @elseif($role == 'RA')
            {!! Form::model($wishtimes, ['method' => 'POST', 'url' => 'wishtimes/approve/'.$wishtimes->title]) !!}
            <button type="submit" class="ui primary button">Approve</button>
            {!! Form::close() !!}

            {!! Form::model($wishtimes, ['method' => 'POST', 'url' => 'wishtimes/disapprove/'.$wishtimes->title]) !!}
            <button type="submit" class="ui red button">Disapprove</button>
            {!! Form::close() !!}
        @endif

        <div class="ui horizontal divider"><h2>{{ $wishtimes->title }}</h2></div>

        <div align="center">
            <p>{{ $wishtimes->content }}</p>
        </div>
        <br>
        <br>
        <div class="ui horizontal divider">Photos</div>
        <!-- Slider Container -->
        <div class="ui container">
            <div class="ui centered stackable doubling grid">
                <div class="eight wide column">
                    <div class="owl-carousel" id="multiple-slider">
                        <div class="item"><img src="{{ asset($wishtimes->image) }}" style = "width: 130px; height: 130px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layouts.subbar')

@include('layouts.footer')