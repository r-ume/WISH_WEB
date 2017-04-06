@extends('layouts.common')

@section('title', 'WISH_WEB Event')

@include('layouts.head')

@include('layouts.header')

@section('content')
    <h2>Events</h2>
    <h3>Eventsの一覧ページ</h3>
    <a href = "/events/create">
        <button type="submit" class="ui primary button">create a new events</button>
    </a>

    <div align="center">
        <div class="ui items">
            @foreach($events as $event)
                <div class="ui divider"></div>
                <div class="item" align="left">
                    <div class="image">
                        <img src="{{ asset($event->image) }}">
                    </div>
                    <div class="content">
                        <a class = "header" href = "{{action('EventsController@show', [$event->id])}}"><h3>{{ $event->id }} {{ $event->title }}</h3></a>
                        <div class="meta">
                            <span>
                                <i class="calendar icon"></i>
                                {{ $event->created_at}}
                                <i class="tag icon"></i>
                                @foreach($event->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                                <i class="user icon"></i>
                                Created by {{ $event->creator->first_name }} {{ $event->creator->last_name }}
                                <i class = "users icon"></i>
                                Number of People Joining / Max: {{ $event->usersCount }} / {{ $event->max_people }}
                            </span>
                        </div>
                        <div class="description" align="justify">
                            <p>{{ $event->description }}</p>
                        </div>
                        <div class="extra">
                            <div class="ui blue right floated button">
                                <a href = "{{action('EventsController@show', [$event->id])}}" style ="color:white;">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ui divider"></div>
        <div class="ui buttons">
            <button class="ui button disabled">Previous</button>
            @for($i = 1; $i <= $pageNum + 1; $i++)
                <a href = "/wishtimes?page={{$i}}"><button class="ui button">{{ $i }}</button></a>
            @endfor
            <button class="ui button">...</button>
            <button class="ui button">Next</button>
        </div>
    </div>
    <br />
@endsection

@include('layouts.subbar')

@include('layouts.footer')