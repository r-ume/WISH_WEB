<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type = "text/css" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.css" />
    <script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script type="text/javascript" src="javascript/easyng.js"></script>

    <title>WISHTIMES作成</title>
</head>

<body>
<div class="ui large top hidden menu">
    <div class="ui container">
        <a href="/myprofile" class="header item">
            <img class="logo" src="{{ asset($user->image) }}">
        </a>
        <a class = "item" href = "/">WISH_WEB</a>
        <a class="item" href = "/myprofile">MyProfile</a>
        <a class="item" href = "/events">Events</a>
        <a class="item" href = "/wishtimes">Wishtimes</a>
        <a class="item" href = "/tweets">Tweets</a>
        <div class="right menu">
            <div class="item">
                <a class="ui button">Log in</a>
            </div>
            <div class="item">
                <a class="ui primary button">Sign Up</a>
            </div>
        </div>
    </div>
</div>

<div class="ui container content">
    <div class="ui stackable doubling grid">
        <!-- Middle Content -->
        <div class="twelve wide column">
            <h1> Wish times</h1>
            <h3>Wishtimesの一覧ページ</h3>
            <a href = "/wishtimes/create">
                <button type="submit" class="ui primary button">create a new feeds</button>
            </a>
            <a href = "/wishtimes/yours">
                <button type="submit" class="ui primary button">your feeds</button>
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
                                            <i class="user icon"></i>
                                            {{ $feed->user->full_name }}
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
                        <a href = "/feeds?page={{$i}}"><button class="ui button">{{ $i }}</button></a>
                    @endfor
                    <button class="ui button">...</button>
                    <button class="ui button">Next</button>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="four wide column">
            <div class="ui fluid vertical menu moderns">
                <a href="" class="header item">Category</a>
                    @foreach($categories as $category)
                        <a href="" class="item">{{ $category->name }}</a>
                    @endforeach
            </div>
            <div class="ui segments moderns">
                <div class="ui header segment">
                    Tweets
                </div>
                <div class="ui segment">
                    <div class="owl-carousel" id="single-slider">
                        @foreach($tweets as $tweet)
                            <div class="item">
                                {{--<p><img class="ui rounded image" src="assets/img/400x400.png"></p>--}}
                                <div align="justify">
                                    {{--<div class="ui header">{{ $tweet->tweet }}</div>--}}
                                    <p>{{ $tweet->tweet }} <br /><i class="calendar icon"></i>{{ $tweet->created_at }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{--<div class="ui secondary segment">--}}
                {{--Other Content--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>

<!-- Footer area -->
<div class="ui inverted vertical footer segment">
    <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">
            <div class="three wide column">
                <h4 class="ui inverted header">WISH_WEBについて</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">困ったら、RAに連絡を</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Services</h4>
                <div class="ui inverted link list">
                    <a href="#" class="item">マイプロフィール</a>
                    <a href="#" class="item">Wishtimes</a>
                    <a href="#" class="item">イベント</a>
                    <a href="#" class="item">つぶやきWISH</a>
                </div>
            </div>
            <div class="seven wide column">
                <h4 class="ui inverted header">いいね！</h4>
                <p>気楽にゆるーく、まあ、何回も失敗してもいいんじゃない？死ぬわけじゃないじゃないし</p>
            </div>
        </div>
    </div>
</div>
</body>

</html>
