<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model {
    protected $table = 'favoritos';
    protected $fillable = ['codigo_usuario', 'codigo_usuario_favorito'];
}
