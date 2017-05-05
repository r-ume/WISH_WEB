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
        <div class = "ui feed">
            @foreach($initial_timeline as $tl)
                <div class="event">
                    <div class ="label">
                        @if($tl->author->image) <img src= {{ $tl->author->image }}>
                        @elseif($tl->creator->image) <img src= {{ $tl->author->image }}>
                        @endif
                    </div>

                    <div class="content">
                        <div class="summary">
                            <a>{{ $tl->author->first_name }} {{ $tl->author->last_name }}</a> made a new {{ get_class($tl) }}
                            <div class="date">{{ $tl->created_at }}</div>
                        </div>

                        <div class="extra text">
                            @if($tl->description)
                                <a href = "{{action('EventsController@show', [$tl->id])}}" style = "color: black">
                                    {{ $tl->description }}</a>
                            @elseif($tl->content)
                                <a href = "{{action('EventsController@show', [$tl->id])}}" style = "color: black">
                                    {{ $tl->content }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class = "infinite-scroll">
            <div class="ui feed">
                @foreach($timeline as $tl)
                    <div class="event">
                        <div class="label">
                            id: {{$tl->id}}
                            class: {{ get_class($tl) }}
                            {{$tl->created_at}}
                            {{--@if($tl->creator->image)--}}
                                {{--<img src= {{ $tl->creator->image }}>--}}
                            {{--@elseif($tl->author->image)--}}
                                {{--<img src= {{ $tl->creator->image }}>--}}
                            {{--@else--}}
                                {{--no photo--}}
                            {{--@endif--}}
                        </div>
                        {{--<div class="content">--}}
                            {{--<div class="summary">--}}
                                {{--<a>{{ $event->creator->first_name }} {{ $event->creator->last_name }}</a> made a new status--}}
                                {{--<div class="date">{{ $event->created_at }}</div>--}}
                            {{--</div>--}}
                            {{--<div class="extra text">--}}
                                {{--<a href = "{{action('EventsController@show', [$event->id])}}" style = "color: black">--}}
                                    {{--{{ $event->description }}--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <br>
                @endforeach
                {{ $timeline->links() }}
            </div>
        </div>
    </div>
@endsection

@include('layouts.footer')