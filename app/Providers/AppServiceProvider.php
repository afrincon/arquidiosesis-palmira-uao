<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar',
        ]);

        Validator::extend('date_greater_than', function($attribute, $value, $parameters, $validator) {
            $inserted = Carbon::parse($value)->year;
            $since = $parameters[0];
            return $inserted >= $since && $inserted<= Carbon::now()->year;
        }); 

        Validator::extend('birthdate', function($attribute, $value, $parameters, $validator) {
            $current = Carbon::now();
            //dd($value > $current->subYear(105)->toDateString());
            if($value < $current->subYear(18)->toDateString() ) {
                    return $current->subYear(18)->toDateString();
            }
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
