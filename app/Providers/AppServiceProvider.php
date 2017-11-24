<?php

namespace App\Providers;

use App\Models\KProdi\Jurusan;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $jurusan = Jurusan::get()->toArray();
        View::share('jurusan', $jurusan);
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
