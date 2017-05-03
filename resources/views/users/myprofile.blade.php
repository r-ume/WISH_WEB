@extends('layouts.common')

@section('title', 'WISH_WEB ' . $user->full_name)

@include('layouts.head')

@include('layouts.header')

@section('content')
    <!-- Middle Content -->
    <div class = "one wide column"></div>
    <div class="six wide column" align="center">
        <br />
        <div class="column">
            <img class="ui rounded image" src= {{ $user->image }} alt="">
            <div class="ui header">{{ $user->first_name }} {{ $user->last_name }}</div>
            <p>Floor: {{ $user->floor }}</p>
            <p>{{ $user->created_at }}</p>
            <br />
        </div>
    </div>
    <div class = "one wide column"></div>
    <div class = "eight wide column" align="center">
        <br />
        <div class = "infinite-scroll">

        <div class="ui feed">
                @foreach($events as $event)
                    <div class="event">
                        <div class="label">
                            <img src= {{ $event->creator->image }}>
                        </div>
                        <div class="content">
                            <div class="summary">
                                <a>{{ $event->creator->first_name }} {{ $event->creator->last_name }}</a> made a new status
                                <div class="date">{{ $event->created_at }}</div>
                            </div>
                            <div class="extra text">
                                <a href = "{{action('EventsController@show', [$event->id])}}" style = "color: black">
                                    {{ $event->description }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
                {{ $events->links() }}
            </div>
        </div>
    </div>
@endsection

@include('layouts.footer')