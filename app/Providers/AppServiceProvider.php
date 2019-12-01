<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;//导入共享类
use App\Http\Controllers\Home\IndexController;
use Illuminate\Support\Facades\Schema;//导入把字符串长度变大类

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('common_links',IndexController::getLinksData());
        Schema::defaultStringLength(191);//把字符串长度变大
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
