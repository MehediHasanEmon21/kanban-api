<?php

use App\Http\Controllers\v1\TaskController;
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

Route::prefix('v1/task')->group(function(){

    Route::get('/',[TaskController::class,'index']);
    Route::post('/create',[TaskController::class,'store']);
    Route::put('/update/{id}',[TaskController::class,'update']);
    
});
