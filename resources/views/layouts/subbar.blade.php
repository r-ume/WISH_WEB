@section('subbar')
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
@endsection