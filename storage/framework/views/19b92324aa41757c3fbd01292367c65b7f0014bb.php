<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"> Registro de Usuario </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="/validator">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group  <?php echo e($errors->has('usuario') ? 'invalid-feedback-modify' : ''); ?>">
                            <label for="usuario"> Usuario </label>
                            <input class="form-control <?php echo e($errors->has('usuario') ? 'is-invalid' : ''); ?>" type="text" name="usuario" placeholder="Ingrese usuario">
                            <?php echo $errors->first('usuario', '<span class="form-text">:message</span>'); ?>

                        </div>
                        <div class="form-group  <?php echo e($errors->has('fecha_nac') ? 'invalid-feedback-modify' : ''); ?>">
                            <label for="fecha_nac"> Fecha de Nacimiento </label>
                            <input class="form-control <?php echo e($errors->has('fecha_nac') ? 'is-invalid' : ''); ?>" type="text" id="fecha_nac" name="fecha_nac" placeholder="Seleccione fecha de nacimiento" readonly>
                            <?php echo $errors->first('fecha_nac', '<span class="form-text">:message</span>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('password') ? 'invalid-feedback-modify' : ''); ?>">
                            <label for="password"> Contraseña </label>
                            <input class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" type="password" name="password" placeholder="Ingrese contraseña">
                            <?php echo $errors->first('password', '<span class="form-text">:message</span>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('password_confirm') ? 'invalid-feedback-modify' : ''); ?>">
                            <label for="password_confirmation"> Confirmar Contraseña </label>
                            <input class="form-control <?php echo e($errors->has('password_cconfirmation') ? 'is-invalid' : ''); ?>" type="password" name="password_confirmation" placeholder="Confirme contraseña">
                            <?php echo $errors->first('password_confirmation', '<span class="form-text">:message</span>'); ?>

                        </div>
                        <button class="btn btn-primary btn-block"> Registrar </button>
                    </form>
                    <div class="text-center">
                        <div class="text-center">
                            o
                        </div>
                        <div class="text-center">
                            <a href="<?php echo action('Auth\LoginController@index'); ?>"> <h5> Iniciar sesión </h5> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#fecha_nac').datepicker({
            locale: 'es-es',
            uiLibrary: 'bootstrap4',
            // format: 'dd/mm/yyyy'
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>