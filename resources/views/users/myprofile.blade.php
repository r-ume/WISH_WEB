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

    <!-- Site Properties -->
    <title>My Profile</title>

    <style type="text/css">
        body {
            background-color: #FFFFFF;
        }
        .ui.menu .item img.logo {
            margin-right: 1.5em;
        }
        .main.container {
            margin-top: 7em;
        }
        .wireframe {
            margin-top: 2em;
        }
        .ui.footer.segment {
            margin: 5em 0em 0em;
            padding: 5em 0em;
        }
    </style>

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
            @foreach(Auth::user()->roles as $role)
                @if($role->role == "RA")
                    <a class="item" href = "/residents">Residents</a>
                @endif
            @endforeach
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
            <br>
            <div class="ui horizontal divider"><h2>My Profile</h2></div>

            <!-- Middle Content -->
            <div class = "one wide column"></div>

            <div class="six wide column" align="center">
                <br />
                <div class="column">
                    <img class="ui rounded image" src= {{ $user->image }} alt="">
                    <div class="ui header">{{ $user->first_name }} {{ $user->last_name }}</div>
                    <p>Floor: {{ $user->floor }}</p>
                    <p>{{ $user->created_at }}</p>
                </div>
            </div>

            <div class = "one wide column"></div>
            <div class = "eight wide column" align="center">
                <br />
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


