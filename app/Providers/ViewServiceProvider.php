<?php

namespace App\Providers;

use App\View\Composers\SearchFormComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.search-form', SearchFormComposer::class);
    }
}
