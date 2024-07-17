<?php

use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\EventTypeApiController;
use App\Http\Controllers\Api\RoomApiController;
use App\Http\Controllers\Api\RoomTypeApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
        return new App\Http\JsonResponse\ErrorJsonResponse('Invalid credentials');
    }

    if (false === password_verify($request->get('password'), $user->password)) {
        return new App\Http\JsonResponse\ErrorJsonResponse('Invalid credentials');
    }

    $user->remember_token =  md5(microtime()); //gerar o token
    $user->save();

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

Route::post('/login', [AuthController::class, 'login']);

Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [ProfileController::class, 'index']);
    Route::get('/{id}', [ProfileController::class, 'show']);
    Route::post('/', [ProfileController::class, 'store']);
    Route::patch('/{id}', [ProfileController::class, 'update']);
    Route::delete('/{id}', [ProfileController::class, 'delete']);
});