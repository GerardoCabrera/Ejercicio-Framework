<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title"> Acceso </h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group  <?php echo e($errors->has('usuario') ? 'invalid-feedback-modify' : ''); ?>">
                            <label for="usuario"> Usuario </label>
                            <input class="form-control <?php echo e($errors->has('usuario') ? 'is-invalid' : ''); ?>" type="text" name="usuario" placeholder="Ingrese su usuario">
                            <?php echo $errors->first('usuario', '<span class="form-text">:message</span>'); ?>

                        </div>
                        <div class="form-group <?php echo e($errors->has('clave') ? 'invalid-feedback-modify' : ''); ?>">
                            <label for="clave"> Contraseña </label>
                            <input class="form-control <?php echo e($errors->has('clave') ? 'is-invalid' : ''); ?>" type="password" name="clave" placeholder="Ingrese su contraseña">
                            <?php echo $errors->first('clave', '<span class="form-text">:message</span>'); ?>

                        </div>
                        <button class="btn btn-primary btn-block"> Acceder </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>