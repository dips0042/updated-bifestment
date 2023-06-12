<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/detailspage', function () {
//     return view('eventdetail');
// });
Route::get('/eventdetail/{eventId}', [EventController::class, 'showDetails'])->name('details');

Route::post('/registerevent/{eventId}', [HistoryController::class, 'regist'])->name('register.event');

Route::get('/homepage', [EventController::class, 'homepageData']);
Route::get('/history', [HistoryController::class, 'showHistory']);
Route::get('/', [EventController::class, 'welcomeController']);