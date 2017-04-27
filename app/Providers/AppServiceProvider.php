<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\User;
use Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer('*', function($view){
        $view->with('user_view_composer', new User());
      });

      Validator::extend('min_array_size', function ($attribute, $value, $parameters, $validator) {
              $data = $value;
              echo count($data);
              exit();
              if( ! is_array($data)){
                  return true;
              }

              return count($data) >= $parameters[0];
        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
