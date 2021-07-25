<?php

use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::apiResource('testimonials', TestimonialController::class)->only(['index', 'store']);
Route::post('contact-me', [ContactMessageController::class, 'store'])->name('contact.message.store');
