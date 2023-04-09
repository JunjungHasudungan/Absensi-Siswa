<?php

use App\Http\Controllers\Admin\Api\{
        UserController as ApiUserController,
        ClassroomController as ApiClassroomController,
    };

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group( ['middleware' => ['auth:sanctum'] ], function(){
});

// Route::group(['middleware' => ['auth:api'], 'prefix'  => 'api.', ], function(){
    //     Route::apiResources([
        //         'users'     => UserController::class,
        //     ]);
        // });

        Route::get('classrooms', ApiClassroomController::class);
        Route::get('users', ApiUserController::class);
