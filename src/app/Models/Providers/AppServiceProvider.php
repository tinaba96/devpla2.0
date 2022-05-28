<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
      if ($this->app->environment() == 'production') {
        URL::forceScheme('https');
    }
      // グローバル変数
      // 管理者のID番号を1とする
      // 参照: https://stackoverflow.com/questions/28356193/
      config(['admin_id' => 1]);
      Schema::defaultStringLength(191);
    }
}
