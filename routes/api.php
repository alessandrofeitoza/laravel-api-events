<?php

use App\Http\Controllers\Api\EventTypeApiController;
use App\Http\Controllers\Api\RoomTypeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(RoomTypeApiController::class)->prefix('/room-types')->group(function () {
    Route::get('/', 'getAll');
    Route::post('/', 'create');
});

Route::controller(EventTypeApiController::class)->prefix('/event-types')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getOne');
    Route::delete('/{id}', 'delete');
    Route::post('/', 'create');
    Route::patch('/{id}', 'update');
});
