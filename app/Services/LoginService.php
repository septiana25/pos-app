<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginService {
  public function login(array $request){
    if (!Auth::attempt($request)) {
      throw new Exception('Email atau password salah.');
    }
    
    Session::regenerate();

  }

  public function logout(): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
    }
}