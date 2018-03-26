<?php

namespace App\Http\Controllers;

use Auth;
use App\Usuario;
use App\Favorito;
use Illuminate\Http\Request;

class FavoritosController extends Controller {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $codigoUsuario = Auth::user()->codigo_usuario;
        $favorito = new Favorito([
            'codigo_usuario' => $codigoUsuario,
            'codigo_usuario_favorito' => $request->get('codigo_usuario_favorito')
        ]);
        $favorito->save();

        return redirect('/index')->with(array('status' => 'Ha agregado al usuario ' . $request->get('codigo_usuario_favorito') . ' como favorito.'));
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
        $favorito = Favorito::where($id)->firstOrFail();
        $favorito->delete();
        return redirect('/index')->with('status', 'Ha eliminado al usuario ' . $id . ' de sus favoritos.');
    }
}
