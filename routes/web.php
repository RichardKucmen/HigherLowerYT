<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["prefix" => "admin"], function(){
    Route::get("", [AdminController::class, 'index'])->name('admin.index');
    Route::get("/videos", [AdminController::class, 'getAllVideos'])->name('admin.getAllVideos');
    Route::get("/video/{id}/edit", [AdminController::class, 'editVideo'])->name('admin.editVideo');
    Route::get("/video/{id}/delete", [AdminController::class, 'deleteVideo'])->name('admin.deleteVideo');
    Route::post("/add/video", [AdminController::class, 'addVideo'])->name('admin.addVideo');
});
