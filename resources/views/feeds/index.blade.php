@extends('layouts.common')

@section('title', 'WISH_WEB Feed')

@include('layouts.head')

@include('layouts.header')

@section('content')
    <h2>Feeds</h2>
    <h3>Feedsの一覧ページ</h3>
    <a href = "/feeds/create">
        <button type="submit" class="ui primary button">create a new feeds</button>
    </a>

    <div align="center">
        <div class="ui items">
            @foreach($feeds as $feed)
                <div class="ui divider"></div>
                <div class="item" align="left">
                    <div class="image">
                        <img src="{{ asset($feed->image) }}">
                    </div>
                    <div class="content">
                        <a class = "header" href = "{{action('FeedsController@show', [$feed->id])}}"><h3>{{ $feed->id }} {{ $feed->title }}</h3></a>
                        <div class="meta">
                            <span>
                                <i class="calendar icon"></i>
                                {{ $feed->created_at}}
                                <i class="tag icon"></i>
                                @foreach($feed->categories as $category)
                                    {{ $category->name }}
                                @endforeach
                            </span>
                        </div>
                        <div class="description" align="justify">
                            <p>{{ $feed->content }}</p>
                        </div>
                        <div class="extra">
                            <div class="ui blue right floated button">
                                <a href = "{{action('FeedsController@show', [$feed->id])}}" style ="color:white;">Read More</a>
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