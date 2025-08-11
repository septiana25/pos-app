<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(
        private LoginService $loginService
    )
    {}
    public function index(){
        return view('auth.login');
    }

    public function handleLogin(LoginRequest $request){

        try {
            //code...
           $login = $this->loginService->login([
                'email' => $request->validated()['email'],
                'password' => $request->validated()['password']
            ]);

            dd(Auth::user());
        } catch (\Throwable $th) {
            return back()->withErrors([
                'email' => $th->getMessage()
            ]);
        }
    }
}
