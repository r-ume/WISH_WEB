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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script type="text/javascript" src="javascript/easyng.js"></script>

    <!-- Site Properties -->
    <title>WISH_WEB</title>
    <style type="text/css">
        .hidden.menu {
            display: none;
        }

        .masthead.segment {
            min-height: 700px;
            padding: 1em 0em;
        }
        .masthead .logo.item img {
            margin-right: 1em;
        }
        .masthead .ui.menu .ui.button {
            margin-left: 0.5em;
        }
        .masthead h1.ui.header {
            margin-top: 3em;
            margin-bottom: 0em;
            font-size: 4em;
            font-weight: normal;
        }
        .masthead h2 {
            font-size: 1.7em;
            font-weight: normal;
        }

        .ui.vertical.stripe {
            padding: 8em 0em;
        }
        .ui.vertical.stripe h3 {
            font-size: 2em;
        }
        .ui.vertical.stripe .button + h3,
        .ui.vertical.stripe p + h3 {
            margin-top: 3em;
        }
        .ui.vertical.stripe .floated.image {
            clear: both;
        }
        .ui.vertical.stripe p {
            font-size: 1.33em;
        }
        .ui.vertical.stripe .horizontal.divider {
            margin: 3em 0em;
        }

        .quote.stripe.segment {
            padding: 0em;
        }
        .quote.stripe.segment .grid .column {
            padding-top: 5em;
            padding-bottom: 5em;
        }

        .footer.segment {
            padding: 5em 0em;
        }

        .secondary.pointing.menu .toc.item {
            display: none;
        }

        @media only screen and (max-width: 700px) {
            .ui.fixed.menu {
                display: none !important;
            }
            .secondary.pointing.menu .item,
            .secondary.pointing.menu .menu {
                display: none;
            }
            .secondary.pointing.menu .toc.item {
                display: block;
            }
            .masthead.segment {
                min-height: 350px;
            }
            .masthead h1.ui.header {
                font-size: 2em;
                margin-top: 1.5em;
            }
            .masthead h2 {
                margin-top: 0.5em;
                font-size: 1.5em;
            }
        }
    </style>

    <script>
        $(document)
                .ready(function() {

                    // fix menu when passed
                    $('.masthead')
                            .visibility({
                                once: false,
                                onBottomPassed: function() {
                                    $('.fixed.menu').transition('fade in');
                                },
                                onBottomPassedReverse: function() {
                                    $('.fixed.menu').transition('fade out');
                                }
                            })
                    ;

                    // create sidebar and attach to menu open
                    $('.ui.sidebar')
                            .sidebar('attach events', '.toc.item')
                    ;

                })
                .ready(function(){
                    $('.title').easyng({
                        dir : 'bottom' ,
                        pattern : 'easeInQuad',
                        time : 380
                    });
                    $('.quote').easyng({dir : 'bottom'});
                })
        ;
    </script>
</head>
<body>

    <!-- Following Menu -->
    <div class="ui large top fixed hidden menu">
        <div class="ui container">
            <a class="active item" href = "/myprofile">MyProfile</a>
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

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar menu">
        <a class="active item">Home</a>
        <a class="item" href = "/myprofile">MyProfile</a>
        <a class="item" href = "/events">Events</a>
        <a class="item" href = "wishtimes">Wishtimes</a>
        <a class="item" href = "tweets">Tweets</a>
        <a class="item">Signup</a>
    </div>

    <!-- Page Contents -->
    <div class="pusher">
        <div class="ui inverted vertical masthead center aligned segment" style = "background-image:url('{{ URL::asset('1.jpg') }}')" >
            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
                        <i class="sidebar icon"></i>
                    </a>
                    <a class="active item">Home</a>
                    <a class="item" href = "myprofile">My Profile</a>
                    <a class="item" href = "/events">Events</a>
                    <a class="item" href = "/wishtimes">Wishtimes</a>
                    <a class="item" href = "/tweets">Tweets</a>
                    <div class="right item">
                        <a class="ui inverted button" href = "/auth/login">Log in</a>
                        <a class="ui inverted button" href = "/auth/register">Sign Up</a>
                    </div>
                </div>
            </div>

            <div class="ui text container">
                <h1 class="ui inverted header title" data-ft="WISH_WEB"></h1>
                <h2 class="quote">{{ Inspiring::quote() }}</h2>
                <div class="ui huge primary button">Get Started <i class="right arrow icon"></i></div>
            </div>

        </div>

        <div class="ui vertical stripe segment">
            <div class="ui middle aligned stackable grid container">
                <div class="row">
                    <div class="eight wide column">
                        <h3 class="ui header">新寮生へ！</h3>
                        <p>まずは、早稲田大学入学おめでとう！受験勉強、本当におつかれさま！今、晴れてWISH寮生になった君には、ぜひこのサイトを見て、WISHでの生活を楽しんでね！</p>
                        <h3 class="ui header">在寮生へ！</h3>
                        <p>残り一年間、WISHで何ができるのか、悔いのない、寮生活を送ってね！</p>
                    </div>
                    <div class="six wide right floated column">
                        <img src="assets/images/wireframe/white-image.png" class="ui large bordered rounded image">
                    </div>
                </div>
                <div class="row">
                    <div class="center aligned column">
                        <a class="ui huge button">Check Them Out</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="ui vertical stripe quote segment">
            <div class="ui equal width stackable internally celled grid">
                <div class="center aligned row">
                    <div class="column">
                        <h3>女好きもいいじゃないか</h3>
                        <p>水谷だもの</p>
                    </div>
                    <div class="column">
                        <h3>WISHは、いい環境しかない</h3>
                        <p>
                            <img src="assets/images/avatar/nan.jpg" class="ui avatar image"> <b>最高</b>　ちょー楽しい！
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui vertical stripe segment">
            <div class="ui text container">
                <h3 class="ui header">寮生サポートになってみない？</h3>
                <p>
                    寮には、たくさんのイベントあって、RAだけではなく、寮生サポートといって、寮生がイベントを運営する立場になることもできるんだ。
                    いろいろな人と交流できるし、リーダー経験も積める。ちょっとやってみない？
                </p>
                <a class="ui large button">Read More</a>
                <h4 class="ui horizontal header divider">
                    <a href="#">Case Studies</a>
                </h4>
                <h3 class="ui header">困ったら、すぐにRAに</h3>
                <p>なんでも相談に乗るよ。気楽に、声をかけてね。(^^)</p>
                <a class="ui large button">RAに呼びかける</a>
            </div>
        </div>


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
    </div>

</body>

</html>
