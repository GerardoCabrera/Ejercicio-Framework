<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioPago extends Model {
    protected $table = 'usuarios_pagos';
    protected $fillable = ['codigo_pago', 'codigo_usuario'];
}
