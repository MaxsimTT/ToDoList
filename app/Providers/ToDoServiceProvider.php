<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\ToDoEloquentOrm;

class ToDoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('App\Helpers\Contracts\ToDo', function() {
            return new ToDoEloquentOrm();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
