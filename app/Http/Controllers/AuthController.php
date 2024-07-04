<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function doLogin(AuthRequest $request){
        if (Auth::attempt($request->validated())){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
        return back()->withErrors([
            'email' => 'Identifiant incorrect'
        ])->onlyInput('email');
    }

    public function doLogout(){
        Auth::logout();
        return to_route('auth.login')->with('success', 'Utilisateur déconnecté avec succès');
    }
}
