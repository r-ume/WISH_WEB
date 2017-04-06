@extends('layouts.common')

@section('title', 'WISH_WEB Wishtimes')

@include('layouts.head')

@include('layouts.header')

@section('content')
    <div class="twelve wide column">
        <h1> Wish times</h1>
        <h3>Wishtimesの一覧ページ</h3>
        <a href = "/wishtimes/create">
            <button type="submit" class="ui primary button">create a new wishtimes</button>
        </a>
        <a href = "/wishtimes/yours">
            <button type="submit" class="ui primary button">your wishtimes</button>
        </a>
        <div align="center">
            <div class="ui items">
                @foreach($wishtimes as $wishtime)
                    <div class="ui divider"></div>
                    <div class="item" align="left">
                        <div class="image">
                            <img src="{{ asset($wishtime->image) }}">
                        </div>
                        <div class="content">
                            <a class = "header" href = "{{action('WishtimesController@show', [$wishtime->id])}}"><h3>{{ $wishtime->id }} {{ $wishtime->title }}</h3></a>
                            <div class="meta">
                                <span>
                                    <i class="calendar icon"></i>
                                    {{ $wishtime->created_at}}
                                    <i class="tag icon"></i>
                                    @foreach($wishtime->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                    <i class="user icon"></i>
                                    {{ $wishtime->user->first_name }} {{ $wishtime->user->last_name }}
                                </span>
                            </div>
                            <div class="description" align="justify">
                                <p>{{ $wishtime->content }}</p>
                            </div>
                            <div class="extra">
                                <div class="ui blue right floated button">
                                    <a href = "{{action('WishtimesController@show', [$wishtime->id])}}" style ="color:white;">Read More</a>
                                </div>
                                @if($wishtime->isApproved == 0) <div class="ui yellow right floated button">Pending</div>
                                @elseif ($wishtime->isApproved == 1) <div class="ui red right floated button">Rejected</div>
                                @elseif ($wishtime->isApproved == 2) <div class="ui blue right floated button">Approved</div>
                                @endif
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
    </div>
@endsection

@include('layouts.subbar')

@include('layouts.footer')