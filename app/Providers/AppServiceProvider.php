<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\User;
use Validator;
use Hash;
use Auth;
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
        if(Auth::guard('front')->check()) {
          $date_of_birth = explode("-",Auth::guard('front')->user()->date_of_birth);
          if($date_of_birth[0] !="" && $date_of_birth[1] !="" && $date_of_birth[2] !="") {
            $view->with('dob_days', $date_of_birth[0]);
            $view->with('dob_month', $date_of_birth[1]);
            $view->with('dob_year', $date_of_birth[2]);
          }
          else {
            $view->with('dob_days', '');
            $view->with('dob_month', '');
            $view->with('dob_year', '');
          }

        }
        else {
          $view->with('dob_days', '');
          $view->with('dob_month', '');
          $view->with('dob_year', '');
        }

      });

      Validator::extend('check_old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::guard('front')->user()->password);

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
