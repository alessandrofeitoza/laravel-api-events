<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\BookingAdminController;
Route::get('/', function () {
    return view('_templates/base');
});

Route::get('/teste', function() {
    echo "teste";
});

Route::get('/admin/usuarios', [UserAdminController::class, 'list']);
Route::get('/admin/booking', [BookingAdminController::class, 'list']);
Route::get('/admin/booking/cadastro', [BookingAdminController::class, 'store']);