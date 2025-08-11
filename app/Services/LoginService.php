<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginService {
  public function login(array $request){
    if (Auth::attempt($request)) {
      Session::regenerate();
      return Auth::user();
    }

    throw new Exception('Email atau password salah.');

  }

  public function logout(): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
    }
}