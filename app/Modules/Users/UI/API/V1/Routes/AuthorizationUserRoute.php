<?php

use App\Modules\Users\UI\API\V1\Controllers\AuthorizationUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('/api/v1/users/authorization')->middleware('api')->group(function () {

    Route::post('/registration', [AuthorizationUserController::class, 'registration']);

    Route::post('/login', [AuthorizationUserController::class, 'login']);

    Route::get('/exit', [
        AuthorizationUserController::class, 'exit'
    ])->middleware('auth:sanctum');

});
