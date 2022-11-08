<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Console\Events\CommandStarting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make(Dispatcher::class)
                  ->listen(CommandStarting::class, function ($event) {
                      dd(
                          $event->input->getArgument('arg'), // 'test:command'
                          $event->input->getArgument('arg1'), // value of `arg`
                      );
                  });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
