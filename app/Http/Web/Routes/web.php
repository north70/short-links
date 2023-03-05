<?php

use App\Http\Web\Modules\Links\Controllers\LinksController;
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

Route::get('/status', function () {
    return response()->json(['status' => 'OK']);
});

Route::get('/links', [LinksController::class, 'show'])->name('links.show');
Route::post('/links', [LinksController::class, 'generate'])->name('links.generate');
Route::get('/links/{hash}', [LinksController::class, 'redirect'])->name('links.redirect');