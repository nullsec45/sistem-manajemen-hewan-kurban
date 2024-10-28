<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
  public function login(){
    return view('auth.login');
  }

  public function doLogin(LoginRequest $request){
    $username=$request->username;
    $password=$request->password;

    $field="username";
    $auth=Auth::Attempt([$field => $username, "password" => $password]);

    if($auth){
      return redirect()->route("/");
    }

    return redirect()->back()->with("loginError","The account credentials you entered are incorrect!.");
  }

  public function register(){
    return view('auth.register');
  }

  public function doRegister(RegisterRequest $request){
      User::create([
          "username" => $request->username,
          "email" => $request->email,
          "password" => Hash::make($request->password),
          "role_id" =>  2,
      ]);

      return redirect()->route("/")->with("msg","Berhasil membuat akun.");
  }
}
