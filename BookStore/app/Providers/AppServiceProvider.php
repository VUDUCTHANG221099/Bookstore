<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $carbon= 'Carbon\Carbon';
        $str="Illuminate\Support\Str";
        $url = URL::current();

        // $user_id = Auth::user();
      

        $viewData=[
            'carbon' => $carbon,
            'str'=>$str,
            'url'=>$url,
            
        ];
        View::share($viewData);
        
        
    }
}
