<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model {
    protected $table = 'pagos';
    protected $fillable = ['codigo_pago', 'imṕorte', 'fecha'];

    public function usuarios() {
    	return $this->belongsToMany(Usuario::class, 'usuarios_pagos', 'codigo_usuario', 'codigo_pago');
    }
}
