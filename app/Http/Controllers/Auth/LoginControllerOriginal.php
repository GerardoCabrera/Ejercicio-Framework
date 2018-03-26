<?php

/*
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    * /

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     * /
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     * /
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
*/

namespace App\Http\Controllers\Auth;

use Auth;
use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {

    public function __construct() {
        $this->middleware('guest', ['only' => 'index']);
    }

    public function index() {
        return view('auth.login');
    }

    public function login() {
        $credenciales = $this->validate(request(), [
            $this->username() => 'required|string',
            'password' => 'required|string'
        ]);

        // $p = Usuario::all();

        /*if ($p[0]->usuario == $credenciales[$this->username()] && 
            Hash::check($credenciales['password'], $p[0]->clave) == true) {
            // Session::set('usuario', $p[0]->usuario);
            // session()->put('usuario', $p[0]->usuario);
            session(['usuario' => $p[0]->usuario]);
            return redirect()->route('dashboard');
        }*/

        echo "<pre>";
        print_r($credenciales);
        echo "</pre>";
        return;
        if (Auth::attempt($credenciales)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([$this->username() => trans('auth.failed')])
                ->withInput(request([$this->username()]));
    }

    public function logout() {
        Auth::logout();

        return redirect('auth.login');
    }

    public function username() {
        return 'name';
    }
}
