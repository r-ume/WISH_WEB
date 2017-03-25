<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel = "stylesheet" type = "text/css" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.css" />
    <script type ="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.js"></script>
    <script type="text/javascript" src="http://gsgd.co.uk/sandbox/jquery/easing/jquery.easing.1.3.js"></script>

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
    <div class="ui fixed inverted menu">
        <div class="ui container">
            <a href="/myprofile" class="header item">
                <img class="logo" src="{{ asset($user->image) }}">
                WISH_WEB
            </a>
            <a href="/myprofile" class="item">Home</a>
            <a href="/tweets" class="item">Tweet</a>
            <a href="/events" class="item">Events</a>
            <a href="/wishtimes" class="item">Wishtimes</a>
        </div>
    </div>

    <div class="ui main text container">
        <div class="ui one cards">
            <div class="ui card">
                <div class="ui move reveal image">
                    <div class="ui blurring inverted dimmer">
                        <div class="content">
                            <div class="center">
                                <div class="ui teal button">Add Friend</div>
                            </div>
                        </div>
                    </div>
                    <img src="{{ asset($user->image) }}" style = "width: 684px; height: 400px;">
                </div>
                <div class="content">
                    <div class="header">{{ $user->first_name }} {{ $user->last_name }}</div>
                    <div class="meta">
                        <a class="group">Floor: {{ $user->floor }}</a>
                        @foreach($user->roles as $role)
                            <p>Role: {{ $role->role }}</p>
                        @endforeach
                    </div>
                    <div class="description">5階のRAです！</div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui inverted vertical footer segment">
        <div class="ui center aligned container">
            <div class="ui stackable inverted divided grid">
                <div class="three wide column">
                    <h4 class="ui inverted header">Group 1</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Link One</a>
                        <a href="#" class="item">Link Two</a>
                        <a href="#" class="item">Link Three</a>
                        <a href="#" class="item">Link Four</a>
                    </div>
                </div>
                <div class="three wide column">
                    <h4 class="ui inverted header">Group 2</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Link One</a>
                        <a href="#" class="item">Link Two</a>
                        <a href="#" class="item">Link Three</a>
                        <a href="#" class="item">Link Four</a>
                    </div>
                </div>
                <div class="three wide column">
                    <h4 class="ui inverted header">Group 3</h4>
                    <div class="ui inverted link list">
                        <a href="#" class="item">Link One</a>
                        <a href="#" class="item">Link Two</a>
                        <a href="#" class="item">Link Three</a>
                        <a href="#" class="item">Link Four</a>
                    </div>
                </div>
                <div class="seven wide column">
                    <h4 class="ui inverted header">Footer Header</h4>
                    <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
                </div>
            </div>
            <div class="ui inverted section divider"></div>
            <img src="assets/images/logo.png" class="ui centered mini image">
            <div class="ui horizontal inverted small divided link list">
                <a class="item" href="#">Site Map</a>
                <a class="item" href="#">Contact Us</a>
                <a class="item" href="#">Terms and Conditions</a>
                <a class="item" href="#">Privacy Policy</a>
            </div>
        </div>
    </div>
</body>

</html>


