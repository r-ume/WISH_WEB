<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
        public function boot(){
            view()->composer('*', function($view){
                $view_whole_name = $view->getName();
                $view_name_array = explode('.', $view_whole_name);
                $view_action_name = end($view_name_array);
                $view_model_name = reset($view_name_array);
                view()->share(compact('view_whole_name', 'view_action_name', 'view_model_name'));
            });
        }

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
