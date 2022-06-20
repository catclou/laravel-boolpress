<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// http://127.0.0.1:8000/api/test
// Route::get('/test', function(){
//     $name = ['Alex', 'Marco', 'Roby'];
//     return response()->json( compact('name'));
// });

// http://127.0.0.1:8000/api/posts
Route::namespace('Api')->group(function(){
    Route::get('/posts', 'PostController@index');
});
