<?php

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ProductController;
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
//add productos


//add user
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

    //categorias
    Route::post('create-category',[CategoriesController::class, 'create']);
    Route::get('list-category',[CategoriesController::class, 'list']);
    Route::put('update-category/{id}',[CategoriesController::class, 'update']);
    Route::delete('delete-category/{id}',[CategoriesController::class, 'delete']);
    
    //products
    Route::post('create-products',[ProductController::class, 'create']);
    Route::get('list-products',[ProductController::class, 'list']);
    Route::put('update-products/{id}',[ProductController::class, 'update']);
    Route::delete('delete-products/{id}',[ProductController::class, 'delete']);

Route::group(['middleware' => ["auth:sanctum"]], function(){
    //rutas
    Route::post('userProfile', [UserController::class, 'userProfile']);
    Route::post('logout', [UserController::class, 'logout']);
    


});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
   
});
