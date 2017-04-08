<?php namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use \Route as Route;

use App\Feed;
use App\Event;
use App\Tweet;
use App\User;
use App\Wishtimes;

class RouteServiceProvider extends ServiceProvider {

    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router){
        parent::boot($router);

        Route::bind('user', function($full_name){
           return User::get()->where('full_name', $full_name)->first();
        });

        Route::bind('event', function($title){
           return Event::where('title', $title)->first();
        });

        Route::bind('tweet', function($tweet){
           return Tweet::where('tweet', $tweet)->first();
        });

        Route::bind('wishtimes', function($title){
            return Wishtimes::where('title', $title)->first();
        });

        Route::bind('event', function($title){
            return Event::where('title', $title)->first();
        });

        Route::bind('feed', function($title) {
            return Feed::where('title', $title)->first();
        });

    }


    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function($router)
        {
            require app_path('Http/routes.php');
        });
    }
}
