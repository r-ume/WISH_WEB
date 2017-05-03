@section('header')
    <div class="ui large top hidden menu">
        <div class="ui container">
            <a class = "item" href = "/">WISH_WEB</a>
            <a class="item" href = "/myprofile">MyProfile</a>
            <a class="item" href = "/events">Events</a>
            <a class="item" href = "/wishtimes">Wishtimes</a>
            <a class="item" href = "/feeds">Feeds</a>
            <a class="item" href = "/tweets">Tweets</a>
            <a class="item" href = "/calendar">Calendar</a>
            @foreach($user->roles as $role)
                @if($role->role == 'RA')
                    <a class = "item" href = "/residents">Residents</a>
                @endif
            @endforeach

            <div class="right menu">
                <div class="ui dropdown">
                    <div class="item"><img class="logo" src="{{ asset($user->image) }}"></div>

                    <div class="menu">
                        <div class="item">
                            @if($user) Log out
                            @else Log in
                            @endif
                        </div>
                        @if(!$user)<div class="item">Sign Up</div>@endif
                        <div class = "item"><a href = "/myprofile">My Profile</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection