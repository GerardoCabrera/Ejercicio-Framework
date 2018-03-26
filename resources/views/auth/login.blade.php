@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"> Acceso </h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group  {{ $errors->has('usuario') ? 'invalid-feedback-modify' : '' }}">
                            <label for="usuario"> Usuario </label>
                            <input class="form-control {{ $errors->has('usuario') ? 'is-invalid' : '' }}" type="text" name="usuario" placeholder="Ingrese su usuario">
                            {!! $errors->first('usuario', '<span class="form-text">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('clave') ? 'invalid-feedback-modify' : '' }}">
                            <label for="clave"> Contraseña </label>
                            <input class="form-control {{ $errors->has('clave') ? 'is-invalid' : '' }}" type="password" name="clave" placeholder="Ingrese su contraseña">
                            {!! $errors->first('clave', '<span class="form-text">:message</span>') !!}
                        </div>
                        <button class="btn btn-primary btn-block"> Acceder </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
