<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest', ['only' => 'index']);
    }

    public function index() {
        return view('auth.login');
    }

    public function login() {
        $rules = [
            $this->username() => 'required|string',
            'clave' => 'required|string'
        ];

        $messages = [
            $this->username().'.required' => 'Debe ingresar su usuario',
            'clave.required' => 'Debe ingresar su contraseña'
        ];

        $credenciales = $this->validate(request(), $rules, $messages);

        if (Auth::attempt($credenciales)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([$this->username() => trans('auth.failed')])
                ->withInput(request([$this->username()]));
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    public function username() {
        return 'usuario';
    }
}
