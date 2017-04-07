@extends('layouts.common')

@section('title', 'WISH_WEB Feed')

@include('layouts.head')

@include('layouts.header')

@section('content')
    <div class = "twelve wide column">
        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}
        <br />
    </div>
    <div class = "four wide column">
        <div class="ui fluid vertical menu moderns">
            <a href="" class="header item">Recent Events</a>
            @foreach($events as $event)
                <a href="" class="item">{{ $event->title }} {{ date('Y-m-d', $event->start_date) }}</a>
            @endforeach
        </div>
        <div class="ui segments moderns">
            <div class="ui header segment">
                Tweets
            </div>
            <div class="ui segment">
                <div class="owl-carousel" id="single-slider">
                    @foreach($user->joiningEvents as $event)
                        <div class="item">
                            <div align="justify">
                                <p>{{ $event->title }} <br /><i class="calendar icon"></i>{{ $event->created_at }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layouts.footer')