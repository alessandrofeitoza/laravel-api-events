<?php

use App\Http\Controllers\Admin\RoomTypeAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\BookingAdminController;
use App\Http\Controllers\Admin\EventTypeAdminController;
use App\Http\Controllers\Admin\ResourcesAdminController;

Route::get('/', function () {
    return view('_templates/base');
});
Route::get('/admin', function () {
    return view('_templates/base');
});

Route::get('/teste', function() {
    echo "teste";
});

Route::get('/admin/usuarios', [UserAdminController::class, 'list']);
Route::get('/admin/reservas', [BookingAdminController::class, 'list']);
Route::any('/admin/reservas/add', [BookingAdminController::class, 'store']);

Route::controller(RoomTypeAdminController::class)->prefix('/admin/tipos-sala')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
});

Route::controller(ResourcesAdminController::class)->prefix('/admin/resources')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
});
