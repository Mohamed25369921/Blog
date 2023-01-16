<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\PostController;

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

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/test', function () {
    return 'test' ;
}
    
);
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.' , 'middleware' => ['auth','checkLogin']],function(){
    Route::get('settings', [SettingController::class,'index'])->name('settings');
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::post('settings/update/{setting}',[SettingController::class,'update'])->name('settings.update');

    Route::get('users/all',[UserController::class,'getUsersDatatable'])->name('users.all');
    Route::post('users/delete',[UserController::class,'delete'])->name('users.delete');

    Route::get('categories/all',[CategoryController::class,'getCategoriesDatatable'])->name('categories.all');
    Route::post('categories/delete',[CategoryController::class,'delete'])->name('categories.delete');
    
    Route::get('posts/all',[PostController::class,'getPostsDatatable'])->name('posts.all');
    Route::post('posts/delete',[PostController::class,'delete'])->name('posts.delete');

    Route::resources([
        'users' => UserController::class,
        'categories' => CategoryController::class,
        'posts' => PostController::class,
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
