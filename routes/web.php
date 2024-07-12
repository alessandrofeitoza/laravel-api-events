<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserAdminController;

Route::get('/', function () {
    return view('_templates/base');
});

Route::get('/teste', function() {
    echo "teste";
});

Route::get('/admin/usuarios', [UserAdminController::class, 'list']);