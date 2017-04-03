<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
        <link rel = "stylesheet" type = "text/css" href = "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.css" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script type= "text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script type="text/javascript" src="javascript/easyng.js"></script>

        <script type = "text/javascript">
            $(document).ready(function(){
                $('#categories_list').select2();
                $('#users_list').select2();
            });

        </script>
    </head>

    <body>
        <!-- Navbar fixed top area -->
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
                <div class="twelve wide column">
                    <div class = "ui form">
                        <h1>Edit the events: {{$event->name}}</h1>

                        @if($errors->any())
                            <ul class = "alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($event, ['method' => 'PATCH', 'action' => ['EventsController@update', $event->id]]) !!}
                        <div class = "field">
                            {!! Form::label('title', 'Title:') !!}
                            {!! Form::text('title', $event->title) !!}
                        </div>
                        <div class = "field">
                            {!! Form::label('Description', 'Description:') !!}
                            {!! Form::textarea('description', $event->description) !!}
                        </div>
                        <div class = "field">
                            {!! Form::label('max_people', 'Max People:') !!}
                            {!! Form::number('max_people', $event->max_people) !!}
                        </div>
                        <div class = "field">
                            {!! Form::label('start_at', 'Start At:') !!}
                            {!! Form::input('start_at', null, date('Y-m-d H:m:s', $event->start_at), ['name' => 'start_at']) !!}
                        </div>
                        <div class = "field">
                            {!! Form::label('end_at', 'End At:') !!}
                            {!! Form::input('end_at', null, date('Y-m-d H:m:s', $event->end_at), ['name' => 'end_at']) !!}
                        </div>
                        <div class = "field">
                            {!! Form::label('isAllDay', 'IsAllDay:') !!}
                            {!! Form::checkbox('isAllDay', 1) !!}
                        </div>
                        <div class = "field">
                            {!! Form::label('categories_list', 'Categories:') !!}
                            {!! Form::select('categories_list[]', $categories, null, ['id' => 'categories_list', 'multiple']) !!}
                        </div>
                        <div class = "field">
                            {!! Form::label('image', '画像アップロード', ['class' => 'ui blue button']) !!}
                                @if($event->image) {{ asset($event->image) }} @endif
                            {!! Form::file('image') !!}
                        </div>
                        <div class = "field">
                            {!! Form::label('users_list', 'Joiners:') !!}
                            {!! Form::select('users_list[]', $users, null, ['id' => 'users_list', 'multiple']) !!}
                        </div>
                        <div class = "field">
                            {!! Form::submit('Edit the events', ['class' => 'ui blue button']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="four wide column">
                    <div class="ui fluid vertical menu moderns">
                        <a href="" class="header item">Category</a>
                        @unless($event->categories->isEmpty())
                            @foreach($event->categories as $category)
                                <a href="" class="item">{{ $category->name }}</a>
                            @endforeach
                        @endunless
                    </div>

                    <div class="ui segments moderns">
                        <div class="ui header segment">
                            Tweets
                        </div>
                        <div class="ui segment">
                            <div class="owl-carousel" id="single-slider">
                                @foreach($tweets as $tweet)
                                    <div class="item">
                                        <div align="justify">
                                            <p>{{ $tweet->tweet }} <br /><i class="calendar icon"></i>{{ $tweet->created_at }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
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