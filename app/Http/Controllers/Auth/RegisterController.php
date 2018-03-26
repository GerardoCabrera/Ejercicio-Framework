<?php

namespace App\Http\Controllers\Auth;

use App\Usuario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    protected $edadMinima = 18;

    public function registerForm() {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $data) {
        $rules = [
            'usuario' => 'required|min:3|max:20',
            'fecha_nac' => 'required',
            'password' => 'required|min:6|max:20|confirmed',
            'password_confirmation' => 'required|min:6|max:20'
        ];

        $messages = [
            'usuario.required' => 'Debe especificar un nombre de usuario',
            'fecha_nac.required' => 'Debe especificar su fecha de nacimiento',
            'password.required' => 'Debe especificar una contraseña',
            'password_confirmation.required' => 'Debe confirmar la contraseña'
        ];

        $dataArray =[
            'usuario' => $data->get('usuario'),
            'fecha_nac' => $data->get('fecha_nac'),
            'password' => $data->get('password')
        ];

        $validaciones = $this->validate($data, $rules, $messages);
        $hoy = date('Y-m-d');
        $hoy = strtotime($hoy);
        $hoy = date('Y-m-d', $hoy);
        $hoy = date_create($hoy);
        $fechaNac = strtotime($data['fecha_nac']);
        $fechaNac = date('Y-m-d', $fechaNac);
        $fechaNac = date_create($fechaNac);
        $edad = date_diff($fechaNac, $hoy)->format('%y');
        
        if($edad >= $this->edadMinima) {
            $data['edad'] = $edad;
            return $this->register($data);
        } else {
            return redirect('/')->with('flash', 'La edad mínima para registrarse es 18 años');
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data) {
        $hoy = date('Y-m-d');
        $hoy = strtotime($hoy);
        $hoy = date('Y-m-d', $hoy);
        $hoy = date_create($hoy);
        $fecha_nac = strtotime($data['fecha_nac']);
        $fecha_nac = date('Y-m-d', $fecha_nac);
        $fecha_nac = date_create($fecha_nac);
        $edad = date_diff($fecha_nac, $hoy)->format('%y');
        $data['edad'] = $edad;

        return Usuario::create([
            'usuario' => $data['usuario'],
            'edad' => $data['edad'],
            'clave' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request) {
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
