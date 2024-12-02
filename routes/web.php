<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WebController;
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

Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'vi'])) {
        abort('404');
    }
    session()->put('locale', $locale);
    return redirect()->back();
});

// Admin Route
require 'admin.php';

// Web Route
Route::prefix('/')->middleware('role:user|admin|staff')->group(function() {
    Route::get('/payment/result', [PaymentController::class, 'handleResult']);
    Route::post('/payment/create', [PaymentController::class, 'create']);
    Route::post('/payment', [PaymentController::class, 'ticketPayment']);
    Route::get('/tickets/{schedule_id}', [WebController::class, 'ticket']);

    Route::get('/ticket_discount',[WebController::class,'ticket_apply_discount']);
    Route::post('/ticketPaid/image',[WebController::class,'ticketPaid_image']);
    Route::get('/tickets/completed/{id}', [WebController::class, 'ticketCompleted']);


    Route::post('/refund-ticket',[WebController::class,'refund_ticket']);

    Route::get('/profile',[WebController::class,'profile']);
    Route::post('/editProfile',[WebController::class,'editProfile']);
    Route::post('/changePassword',[AuthController::class,'changePassword']);
});

Route::delete('/tickets/combo/delete', [WebController::class, 'ticketComboDelete']);
Route::post('/tickets/combo/create', [WebController::class, 'ticketComboCreate']);
Route::delete('/tickets/delete', [WebController::class, 'ticketDelete']);
Route::post('/tickets/create', [WebController::class, 'ticketPostCreate']);

Route::get('/update-password',[AuthController::class,'update_password']);
Route::post('/update-password',[AuthController::class,'Post_update_password']);
Route::post('/forgot_password',[AuthController::class,'forgot_password']);



Route::get('/verify-email',[AuthController::class,'verify_email']);

Route::post('/feedback',[WebController::class,'feedback']);
Route::get('/contact',[WebController::class,'contact']);

Route::get('/signOut', [AuthController::class, 'signOut']);
Route::get('/events-detail/{id}',[WebController::class,'events_detail']);
Route::get('/news-detail/{id}',[WebController::class,'news_detail']);

Route::get('/search', [WebController::class, 'search']);

Route::get('/movie/{id}', [WebController::class, 'movieDetail']);
Route::get('/movies/filter', [WebController::class, 'movieFilter']);
Route::get('/movies', [WebController::class, 'movies']);

Route::get('/cast/{id}', [WebController::class, 'castDetail']);
Route::get('/director/{id}', [WebController::class, 'directorDetail']);

Route::get('/schedulesByTheater', [WebController::class, 'schedulesByTheater']);
Route::get('/schedulesByMovie', [WebController::class, 'schedulesByMovie']);

Route::get('/events', [WebController::class, 'events']);
Route::get('/news', [WebController::class, 'news']);


Route::post('/signUp', [AuthController::class, 'signUp']);
Route::post('/signin', [AuthController::class, 'signIn']);

Route::get('/', [WebController::class, 'home']);
