<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <link rel = "stylesheet" type = "text/css" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.css" />
        <script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script type="text/javascript" src="javascript/easyng.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

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
        <br />
        <div class = "ui container content">
            <div class = "ui stackable doubling grid">
                <div class = "twelve wide column">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
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
                            Joining Events
                        </div>
                        <div class="ui segment">
                            <div class="owl-carousel" id="single-slider">
                                {{--@foreach--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br />

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

