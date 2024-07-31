<?php

use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\EventTypeApiController;
use App\Http\Controllers\Api\RoomApiController;
use App\Http\Controllers\Api\RoomTypeApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Admin\BookingAdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Log\ErrorLog;
use App\Log\DebugLog;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', function (Request $request) {
    $user = \App\Models\User::query()
        ->where(
            'email',
            '=',
            $request->get('email')
        )->first();

    if (null === $user) {
        password_verify('1234', '$2a$12$HuO4kv30f1XaK8.Qa6OPs.w43hQhrqjdRE6oyphgP8bn8CjhfvrhG');

        (new ErrorLog('Login: user not found', "email: {$request->get('email')}"))->store();

        return new App\Http\JsonResponse\ErrorJsonResponse('Invalid credentials');
    }

    if (false === password_verify($request->get('password'), $user->password)) {
        (new ErrorLog('Login: incorrect password', "email: {$user->email}"))->store();

        return new App\Http\JsonResponse\ErrorJsonResponse('Invalid credentials');
    }

    $user->remember_token =  md5(microtime()); //gerar o token
    $user->save();

    (new DebugLog('Login: successfully', "email: {$user->email}"))->store();

    return new \Symfony\Component\HttpFoundation\JsonResponse([
        'token' => $user->remember_token,
    ]);
});

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

Route::controller(UserApiController::class)->prefix('/users')->group(function () {
    Route::get('/', 'getAll');
    Route::get('/{id}', 'getOne');
    Route::delete('/{id}', 'delete');
    Route::post('/', 'create');
    Route::patch('/{id}', 'update');
});

Route::controller(BookingAdminController::class)->prefix('/bookings')->group(function () {
    Route::get('/{id}', 'getOne');
    Route::patch('/update/{id}', 'update');
});

Route::controller(BookingApiController::class)->prefix('/bookings')->group(function () {
    Route::get('/', 'getAll');
    Route::delete('/{id}', 'delete');
});
