<?php

use App\Http\Controllers\MediaCenter\UrlController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::permanentRedirect('/', config('app.website_url'));

Route::group(['prefix' => 'media', 'as' => 'mediacenter::'], function () {
    Route::group(['prefix' => 'show'], function () {
        Route::get('{collection}/{conversionName}/{media}/{itemName}.jpg', [UrlController::class, 'display'])->name('item.display');
        Route::get('responsive/{collection}/{conversionName}/{media}/{itemName?}', [UrlController::class, 'displayResponsiveImage'])->name('responsive.display');
    });
});
