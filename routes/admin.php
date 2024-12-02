<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\ComboController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieGenresController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    //TODO Sign-in admin
    Route::get('/sign_in', [AdminController::class, 'sign_in']);
    Route::post('/sign_in', [AdminController::class, 'Post_sign_in']);
    Route::get('/sign_out', [AdminController::class, 'sign_out']);
});

Route::prefix('admin')->middleware('admin', 'role:admin|staff')->group(function () {

    Route::get('/', [AdminController::class, 'home']);
    //Revenue
    Route::get('/search_movie', [AdminController::class, 'search_movie']);
    Route::get('/search_theater', [AdminController::class, 'search_theater']);
    // statistical
    Route::get('/filter-by-date', [AdminController::class, 'filter_by_date']);
    Route::get('/statistical-filter', [AdminController::class, 'statistical_filter']);
    Route::get('/statistical-sortby', [AdminController::class, 'statistical_sortby']);

    // scan ticket
    Route::prefix('scanTicket')->group(function () {
        Route::post('/handle', [StaffController::class, 'handleScanTicket']);
        Route::get('/', [StaffController::class, 'scanTicket']);
    });

    // scan ticket
    Route::prefix('scanCombo')->group(function () {
        Route::post('/handle', [StaffController::class, 'handleScanCombo']);
        Route::get('/', [StaffController::class, 'scanCombo']);
    });

    //TODO Buy ticket
    Route::prefix('buyTicket')->group(function () {
        Route::post('/handleResult', [StaffController::class, 'handleResult']);
        Route::post('/createPayment', [StaffController::class, 'createPayment']);
        Route::post('/ticketPayment', [StaffController::class, 'ticketPayment']);
        Route::post('/scanBC', [StaffController::class, 'scanBarcode']);
        Route::get('/{schedule_id}', [StaffController::class, 'ticket']);
        Route::get('/', [StaffController::class, 'buyTicket']);
    });

    Route::post('/ticketCombo/create', [StaffController::class, 'createTicketCombo']);
    Route::prefix('buyCombo')->group(function () {
        Route::get('/', [StaffController::class, 'buyCombo']);
    });

    Route::post('/postprofile', [AdminController::class, 'Postprofile']);
    Route::get('/profile', [AdminController::class, 'profile']);

    Route::get('/feedback', [AdminController::class, 'feedback']);

    //TODO Movie Genres
    Route::prefix('movie_genres')->group(function () {
        Route::get('/', [MovieGenresController::class, 'movie_genres']);
        Route::post('/create', [MovieGenresController::class, 'postCreate']);
        Route::post('/edit/{id}', [MovieGenresController::class, 'postEdit']);
        Route::delete('/delete/{id}', [MovieGenresController::class, 'delete']);
        Route::get('/status', [MovieGenresController::class, 'status']);
    });

    //TODO Movie
    Route::prefix('movie')->group(function () {
        Route::get('/', [MovieController::class, 'movie']);
        Route::get('/create', [MovieController::class, 'getCreate']);
        Route::post('/create', [MovieController::class, 'postCreate']);
        Route::get('/edit/{id}', [MovieController::class, 'getEdit']);
        Route::post('/edit/{id}', [MovieController::class, 'postEdit']);
        Route::delete('/delete/{id}', [MovieController::class, 'delete']);
        Route::get('/status', [MovieController::class, 'status']);
        Route::get('/search', [MovieController::class, 'searchMovie']);
    });

    //TODO Room
    Route::prefix('room')->group(function () {
        Route::get('/delete/{id}', [RoomController::class, 'delete']);
        Route::post('/create', [RoomController::class, 'postCreate']);
        Route::post('/edit/{id}', [RoomController::class, 'postEdit']);
        Route::get('/status', [RoomController::class, 'status']);
        Route::get('/', [RoomController::class, 'room']);
    });

    //TODO Seat
    Route::prefix('seat')->group(function () {
        Route::get('/{id}', [SeatController::class, 'seats']);
        Route::post('/create', [SeatController::class, 'postCreate']);
        Route::post('/edit', [SeatController::class, 'postEdit']);
        Route::get('/on/{id},{room_id}', [SeatController::class, 'on']);
        Route::get('/off/{id},{room_id}', [SeatController::class, 'off']);
        Route::post('/row', [SeatController::class, 'postEditRow']);
        Route::get('/delete/{id}', [SeatController::class, 'delete']);
    });

    //TODO Theater
    Route::prefix('theater')->group(function () {
        Route::get('/', [TheaterController::class, 'theater']);
        Route::post('/create', [TheaterController::class, 'postCreate']);
        Route::post('/edit/{id}', [TheaterController::class, 'postEdit']);
        Route::get('/status', [TheaterController::class, 'status']);
        Route::delete('/delete/{id}', [TheaterController::class, 'delete']);
    });

    //TODO Schedule
    Route::prefix('schedule')->group(function () {
        Route::get('/', [SchedulesController::class, 'schedule']);
        Route::post('/create', [SchedulesController::class, 'postCreate']);
        Route::post('/edit', [SchedulesController::class, 'postEdit']);
        Route::get('/status', [SchedulesController::class, 'status']);
        Route::get('/early_status', [SchedulesController::class, 'early_status']);
        //        Route::delete('/delete/{id}', [SchedulesController::class, 'delete']);
        Route::get('/deleteall', [SchedulesController::class, 'deleteAll']);
    });

    //TODO Events
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'events']);
        Route::post('/create', [EventController::class, 'postCreate']);
        Route::post('/edit/{id}', [EventController::class, 'postEdit']);
        Route::delete('/delete/{id}', [EventController::class, 'delete']);
        Route::get('/status', [EventController::class, 'status']);
    });
    //TODO Discount
    Route::prefix('discount')->group(function () {
        Route::get('/', [DiscountController::class, 'discount']);
        Route::post('/create', [DiscountController::class, 'postCreate']);
        Route::post('/edit/{id}', [DiscountController::class, 'postEdit']);
        Route::get('/status', [DiscountController::class, 'status']);
        Route::delete('/delete/{id}', [DiscountController::class, 'delete']);
    });
    //TODO Book_Ticket
    Route::prefix('ticket')->group(function () {
        Route::get('/', [TicketController::class, 'ticket']);
    });

    //TODO Food/Topping
    Route::prefix('food')->group(function () {
        Route::get('/', [FoodController::class, 'food']);
        Route::post('/create', [FoodController::class, 'postCreate']);
        Route::post('/edit/{id}', [FoodController::class, 'postEdit']);
        Route::delete('/delete/{id}', [FoodController::class, 'delete']);
        Route::get('/status', [FoodController::class, 'status']);
    });

    //TODO user_account
    Route::prefix('user')->group(function () {
        Route::get('/', [AdminController::class, 'user']);
        Route::get('/status', [AdminController::class, 'status']);
        Route::get('/search', [AdminController::class, 'searchUser']);
    });

    //TODO staff_account
    Route::prefix('staff')->group(function () {
        Route::get('/', [AdminController::class, 'staff']);
        Route::post('/create', [AdminController::class, 'postCreate']);
        Route::post('/permission/{id}', [AdminController::class, 'postPermission']);
        Route::delete('/delete/{id}', [AdminController::class, 'delete']);
    });

    //TODO banners
    Route::prefix('banners')->group(function () {
        Route::get('/', [BannerController::class, 'banners']);
        Route::post('/create', [BannerController::class, 'postCreate']);
        Route::post('/edit/{id}', [BannerController::class, 'postEdit']);
        Route::delete('/delete/{id}', [BannerController::class, 'delete']);
        Route::get('/status', [BannerController::class, 'status']);
    });

    //TODO Director
    Route::prefix('director')->group(function () {
        Route::get('/', [DirectorController::class, 'director']);
        Route::post('/create', [DirectorController::class, 'postCreate']);
        Route::post('/edit/{id}', [DirectorController::class, 'postEdit']);
        Route::delete('/delete/{id}', [DirectorController::class, 'delete']);
    });

    //TODO Cast
    Route::prefix('cast')->group(function () {
        Route::get('/', [CastController::class, 'cast']);
        Route::post('/create', [CastController::class, 'postCreate']);
        Route::post('/edit/{id}', [CastController::class, 'postEdit']);
        Route::delete('/delete/{id}', [CastController::class, 'delete']);
    });

    //TODO Combo
    Route::prefix('combo')->group(function () {
        Route::get('/', [ComboController::class, 'combo']);
        Route::post('/create', [ComboController::class, 'postCreate']);
        Route::post('/edit/{id}', [ComboController::class, 'postEdit']);
        Route::get('/status', [ComboController::class, 'status']);
        Route::delete('/delete/{id}', [ComboController::class, 'delete']);
    });

    //TODO News
    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'news']);
        Route::post('/create', [NewsController::class, 'postCreate']);
        Route::post('/edit/{id}', [NewsController::class, 'postEdit']);
        Route::delete('/delete/{id}', [NewsController::class, 'delete']);
        Route::get('/status', [NewsController::class, 'status']);
    });

    //TODO Prices
    Route::prefix('prices')->group(function () {
        Route::get('/', [PriceController::class, 'price']);
        Route::post('/edit', [PriceController::class, 'edit']);
    });

    //TODO Info
    Route::prefix('info')->group(function () {
        Route::get('/', [InfoController::class, 'info']);
        Route::post('/', [InfoController::class, 'postInfo']);
    });
});
