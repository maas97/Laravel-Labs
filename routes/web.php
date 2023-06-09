<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, "index"]);

Route::get('/Posts', [PostController::class, "index"])->name("posts");

Route::get('/Posts/create', [PostController::class, "create"])->name("posts.create");

Route::post('/Posts', [PostController::class, "store"])->name("posts.store");

Route::get('/Posts/{id}/edit', [PostController::class, "edit"])->name("posts.edit");

Route::put('/Posts/{id}/update', [PostController::class, "update"])->name("posts.update");

Route::delete('/Posts/{id}', [PostController::class, "destroy"])->name("posts.destroy");

Route::get('/Posts/{id}', [PostController::class, "show"])->name("posts.show");
