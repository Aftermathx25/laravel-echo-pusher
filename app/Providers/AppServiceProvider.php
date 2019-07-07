<?php

namespace App\Providers;

use App\Message;
use App\Observers\MessageObserver;

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
        Schema::defaultStringLength(191);

        $this->app->bind(
          'App\Repositories\MessageRepositoryInterface',
          'App\Repositories\MessageRepository',
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Message::observe(MessageObserver::class);
    }
}
