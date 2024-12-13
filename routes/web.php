<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\ProfileAdminController;
use App\Http\Controllers\Admin\RoomAdminController;
use App\Http\Controllers\Admin\RoomTypeAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\BookingAdminController;
use App\Http\Controllers\Admin\EventTypeAdminController;
use App\Http\Controllers\Admin\ResourcesAdminController;
use App\Http\Controllers\Admin\SpaceAdminController;

Route::get('/', function () {
    return view('_templates/base');
});
Route::get('/admin', function () {
    return view('_templates/base');
});

Route::get('/teste', function() {
    echo "teste";
});

Route::controller(UserAdminController::class)->prefix('/admin/usuarios')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
});

Route::get('/admin/reservas', [BookingAdminController::class, 'list']);
Route::any('/admin/reservas/add', [BookingAdminController::class, 'store']);

Route::controller(RoomAdminController::class)->prefix('/admin/rooms')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
    Route::any('/{id}', 'edit')->name('admin.rooms.edit');
    Route::delete('/{id}', 'delete')->name('admin.rooms.delete');
});

Route::controller(RoomTypeAdminController::class)->prefix('/admin/tipos-sala')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
});

Route::controller(EventTypeAdminController::class)->prefix('/admin/tipos-evento')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
});

Route::controller(ResourcesAdminController::class)->prefix('/admin/resources')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
});

Route::controller(SpaceAdminController::class)->prefix('/admin/spaces')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
});

Route::controller(ProfileAdminController::class)->prefix('/admin/profiles')->group(function () {
    Route::get('/', 'list');
    Route::any('/add', 'store');
});

