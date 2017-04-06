@section('header')
    <div class="ui large top hidden menu">
        <div class="ui container">
            <a class = "item" href = "/">WISH_WEB</a>
            <a class="item" href = "/myprofile">MyProfile</a>
            <a class="item" href = "/events">Events</a>
            <a class="item" href = "/wishtimes">Wishtimes</a>
            <a class="item" href = "/feeds">Feeds</a>
            <a class="item" href = "/tweets">Tweets</a>
            @foreach($user->roles as $role)
                @if($role->role == 'RA')
                    <a class = "item" href = "/residents">Residents</a>
                @endif
            @endforeach
            <div class="right menu">
                <a href="/myprofile" class="header item"><img class="logo" src="{{ asset($user->image) }}"></a>
                <div class="item">
                    @if($user)
                        <a class="ui button">Log out</a>
                    @else
                        <a class="ui button">Log in</a>
                    @endif
                </div>
                @if(!$user)
                    <div class="item"><a class="ui primary button">Sign Up</a></div>
                @endif
            </div>
        </div>
    </div>
@endsection