<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FollowController;

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

Route::group(['middleware' => 'api','prefix'=>'auth'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    // Route::post('/logout', [JWTController::class, 'logout']);
    // Route::post('/profile', [JWTController::class, 'profile']);
    // Route::post('/refresh', [JWTController::class, 'refresh']);
    // Route::post('/profile', [JWTController::class, 'profile']);
    // Route::get('/abc', [JWTController::class, 'abc']);
    
});

Route::group(['middleware' => 'api','prefix'=>'page'], function($router) {

    Route::post('/create',[PageController::class, 'create']);
    Route::post('/{pageId}/attach-post',[ContentController::class, 'pageContentAdd']);
});

Route::group(['middleware' => 'api','prefix'=>'person'], function($router) {
    Route::post('attach-post',[ContentController::class, 'personContentAdd']);
});

Route::group(['middleware' => 'api','prefix'=>'follow'], function($router) {
    Route::post('person/{personId}',[FollowController::class, 'followPerson']);
    Route::post('page/{pageId}',[FollowController::class, 'followPage']);
});







