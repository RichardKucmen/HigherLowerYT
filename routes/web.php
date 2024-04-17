<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["prefix" => "admin"], function(){
    Route::get("", [AdminController::class, 'index'])->name('admin.index');
    Route::get("/get/videos", [AdminController::class, 'getAllVideos'])->name('admin.getAllVideos');
    Route::get("/video/edit/{id}", [AdminController::class, 'editVideo'])->name('admin.editVideo');
    Route::post("/video/update/{id}", [AdminController::class, 'updateVideo'])->name('admin.updateVideo');
    Route::get("/video/delete/{id}", [AdminController::class, 'deleteVideo'])->name('admin.deleteVideo');
    Route::get("/video/updateInfo/{id}", [AdminController::class, 'updateInfo'])->name('admin.updateInfo');
    Route::get("/new/video", function(){
        return view("admin.new_video", ["video" => (object) ["video_id" => "", "video_name" => "", "video_html_code" => "", "video_views" => "", "user_id" => ""]]);
    })->name("admin.new_video");
    Route::post("/add/video", [AdminController::class, 'addVideo'])->name('admin.addVideo');
});
