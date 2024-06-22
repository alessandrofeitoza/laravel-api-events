<?php

use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\EventTypeApiController;
use App\Http\Controllers\Api\RoomApiController;
use App\Http\Controllers\Api\RoomTypeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(RoomApiController::class)->prefix('/rooms')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getOne');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
    Route::patch('/{id}', 'update');
});

Route::controller(RoomTypeApiController::class)->prefix('/room-types')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getOne');
    Route::post('/', 'create');
    Route::delete('/{id}', 'delete');
    Route::patch('/{id}', 'update');
});

Route::controller(EventTypeApiController::class)->prefix('/event-types')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getOne');
    Route::delete('/{id}', 'delete');
    Route::post('/', 'create');
    Route::patch('/{id}', 'update');
});

Route::controller(EventApiController::class)->prefix('/events')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getOne');
    Route::delete('/{id}', 'delete');
    Route::post('/', 'create');
    Route::patch('/{id}', 'update');
});
