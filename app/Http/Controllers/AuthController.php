<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('pages.login');
    }

    public function loginPOST(Request $request) {
        $this->validate($request, [
            'email' => 'required|exists:admin,email',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $auth = Auth::user();
            if ($auth->isAdmin) {
                return redirect('/admin');
            } else {
                return redirect('/cotizaciones');
            }

        }

        return redirect()
            ->route('login')
            ->withErrors(['No coinciden las credenciales'])
            ->withInput();
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()
            ->route('login');
    }
}
