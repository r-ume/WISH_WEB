@extends('layouts.common')

@section('title', 'Event' . $event->title)

@include('layouts.head')

@include('layouts.header')

@section('content')
    <div class="twelve wide column">
        @if($user->id == $event->user_id)
            {!! Form::model($event, ['method' => 'GET', 'url' => 'events/edit/'.$event->title]) !!}
                <button type="submit" class="ui primary button">edit</button>
            {!! Form::close() !!}

            {!! Form::model($event, ['method' => 'DELETE', 'url' => 'events/'.$event->title]) !!}
                <button type="submit" class="red ui button"
                        onclick = 'return confirm("Are you sure that you would like to delete this event?");'>delete</button>
            {!! Form::close() !!}
        @elseif($attendance)
            <span class="ui yellow button">Attendance Decided</span>
        @elseif($event->usersCount >= $event->max_people)
            <span class="ui red button">Attendance Max</span>
        @else
            {!! Form::model($event, ['method' => 'POST', 'url' => 'events/attend/'.$event->title]) !!}
                {!! Form::hidden('user_id', $user->id) !!}
                    <button type="submit" class="ui yellow button">Attend</button>
            {!! Form::close() !!}
        @endif

        <div class="ui horizontal divider"><h2>{{ $event->title }}</h2></div>

        <div align="center">
            <p>{{ $event->description }}</p>
        </div>

        <br>
        <br>

        <div class="ui horizontal divider">Photos</div>
            <!-- Slider Container -->
            <div class="ui container">
                <div class="ui centered stackable doubling grid">
                    <div class="eight wide column">
                        <div class="owl-carousel" id="multiple-slider">
                            <div class="item"><img src="{{ asset($event->image) }}" style = "width: 130px; height: 130px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@include('layouts.subbar')

@include('layouts.footer')