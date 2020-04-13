<?php

use App\Http\Controllers\Admin\SanctuariesIndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\\Http\\Controllers\\'], function () {
    Auth::routes();
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index']);

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
], function (Router $router) {
    $router->get('/', function () {
        return redirect('/admin/sanctuaries');
    });

    $router->get('sanctuaries', SanctuariesIndexController::class);
});
