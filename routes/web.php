<?php

use App\Http\Controllers\Dashboard\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SettingController;

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
    $arr = [[1,2],[[3],4],[5,[6,7]]];
    
    function array_flatten($arr){
        $out = [];
        foreach($arr as  $a){
            if(is_array($a)){
                foreach ($a as $value) {
                    if (is_array($value)) {
                        return array_flatten($value);
                    }else {
                        $out[] = $value;
                    }
                }
            }else {
                $out[] = $a;
            }
        }
        return $out;
    }
    echo "<pre>";
    print_r(array_flatten($arr));
    }
    
);
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.' , 'middleware' => ['auth','checkLogin']],function(){
    Route::get('settings', [SettingController::class,'index'])->name('settings');
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::post('settings/update/{setting}',[SettingController::class,'update'])->name('settings.update');
    Route::resource('users',UserController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
