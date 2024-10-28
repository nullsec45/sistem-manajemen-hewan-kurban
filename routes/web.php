<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view('welcome');
})->name("/")->middleware('auth');


Route::prefix("auth")->name("auth.")->controller(AuthController::class)->group(function(){
    Route::get("login","login")->name("login");
    Route::post("login","doLogin")->name("do-login");
    Route::get("register","register")->name("register");
    Route::post("register","doRegister")->name("do-register");
    Route::get("forgot-password","forgotPassword")->name("forgot-password");
});

Route::prefix("forgot-password")->name("forgot-password.")->controller(ForgotPasswordController::class)->group(function(){
    Route::get("/","index")->name("index");
});