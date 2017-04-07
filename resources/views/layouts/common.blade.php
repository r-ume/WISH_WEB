<!DOCTYPE html>
<html>
    <head>
        @yield('head')
    </head>

    <body>
        @yield('header')
        <div class="ui container content">
            <div class="ui stackable doubling grid">
                @if($view_action_name == 'create' || $view_action_name == 'edit')
                    <div class="sixteen wide column">
                        @yield('content')
                    </div>
                @elseif($view_model_name == 'users' || $view_model_name == 'calendar')
                    @yield('content')
                @else
                    <div class="twelve wide column">
                        @yield('content')
                    </div>
                    <!-- Right Sidebar -->
                    <div class="four wide column">
                        @yield('subbar')
                    </div>
                @endif
            </div>
        </div>
        @yield('footer')
    </body>
</html>


