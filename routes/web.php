<?php
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Quest;

Route::get('/login', function () {
    return view('login');
});
Route::get('/registration',function(){
    if(Auth::check()) {
        return redirect('welcome');
    }
    return view('registration');
})->name('registration');
Route::post('/registration',[RegisterController::class,'save']);
Route::post('/login',[LoginController::class,'login']);



Route::get('/welcome', [PostController::class,'index'])->name('index');

Route::get('/logout',function(){
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::post('/welcome',[PostController::class,'store'])->name('store');

Route::get('delete/{id}',[PostController::class,'destroy'])->name('delete');