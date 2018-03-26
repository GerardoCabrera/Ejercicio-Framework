<?php

namespace App\Http\Controllers;

use Auth;
use App\Pago;
use App\UsuarioPago;
use Illuminate\Http\Request;

class PagosController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    public function validator(Request $request) {
        if ($request->get('importe') < 1) {
            return redirect('/create')->with('flash', 'El importe debe ser mayor a cero');
        }

        $hoy = date('Y-m-d');
        $hoy = strtotime($hoy);
        $hoy = date('Y-m-d', $hoy);
        $hoy = date_create($hoy);
        $fecha = strtotime($request->get('fecha'));
        $fecha = date('Y-m-d', $fecha);
        $fecha = date_create($fecha);
        $diferencia = date_diff($fecha, $hoy)->format('%d');

        if ($diferencia < 0) {
            return redirect('/create')->with('flash', 'La fecha no puede ser menor al día actual');
        }

        $this->store($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $pago = new Pago([
            'importe' => $request->get('importe'),
            'fecha' => $request->get('fecha')
        ]);
        $pago->save();

        $usuarioPago = new UsuarioPägo([
            'codigo_pago' => $pago->codigo_págo,
            'codigo_usuario' => Auth::user()->codigo_usuario
        ]);
        $usuarioPago->save();

        return redirect('/index')->with(array('status' => 'Ha realizado un pago exitosamente. El código del pago es: ' . $pago->codigo_págo));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
