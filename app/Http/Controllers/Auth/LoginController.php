<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\LoginService;
use Illuminate\Http\Request;
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
            $this->loginService->login([
                'email' => $request->validated()['email'],
                'password' => $request->validated()['password']
            ]);

            return redirect()->route('dashboard');

        } catch (\Throwable $th) {
            return back()->withErrors([
                'email' => $th->getMessage()
            ]);
        }
    }

    public function logout(Request $request){
        $this->loginService->logout();
    }
}
