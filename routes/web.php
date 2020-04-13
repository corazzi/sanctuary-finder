<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', [SearchController::class, 'index']);
