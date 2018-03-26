<?php $__env->startSection('content'); ?>
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<div class="card">
				<ul id="myTab" class="nav nav-pills nav-fill">
				  <li class="nav-item">
				    <a id="listUsers-tab" class="nav-link active" data-toggle="tab" role="tab" href="#listUsers" aria-controls="listUsers" aria-selected="true">Listado de Usuarios</a>
				  </li>
				  <li class="nav-item">
				    <a id="favoritos-tab" class="nav-link" data-toggle="tab" role="tab" href="#favoritos" aria-controls="favoritos" aria-selected="false">Favoritos</a>
				  </li>
				  <li class="nav-item">
				    <a id="listPagos-tab" class="nav-link" data-toggle="tab" role="tab" href="#listPagos" aria-controls="listPagos" aria-selected="false">Listado de Pagos</a>
				  </li>
				  <li class="nav-item">
				    <a id="pagos-tab" class="nav-link" data-toggle="tab" role="tab" href="#pagos" aria-controls="listPagos" aria-selected="false">Pagos Realizados</a>
				  </li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="listUsers" role="tabpanel" aria-labelledby="listUsers-tab">
				  	<div class="row">
				  		<?php 
				  			foreach ($usuarios as $key => $usuario) {
				  				if ($usuario['usuario'] != Auth::user()->usuario) {
				  		?>
				  			<div class="col-md-6"><?= $usuario['usuario']; ?></div>
				  			<div class="col-md-6 text-right">
				  				<button class="btn btn-primary btn-sm"> Agregar a favoritos </button>
				  			</div>
				  			<hr/>
				  		<?php
				  				}
				  			}
				  		?>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="favoritos" role="tabpanel" aria-labelledby="favoritos-tab">
				  	<div class="row">
				  		<?php 
				  			foreach ($favoritos as $key => $favorito) {
				  		?>
				  			<div class="col-md-6"><?= $favorito['codigo_usuario_favorito']; ?></div>
				  			<div class="col-md-6 text-right">
				  				<button class="btn btn-danger btn-sm"> Eliminar favorito </button>
				  			</div>
				  			<hr/>
				  		<?php
				  			}
				  		?>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="listPagos" role="tabpanel" aria-labelledby="listPagos-tab">
				  	<div class="row">
				  		<div class="col-md-6">dhdf</div>
				  		<div class="col-md-6">fdgs</div>
				  	</div>
				  </div>
				  <div class="tab-pane fade" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
				  	<div class="row">
				  		<div class="col-md-6">dhdf</div>
				  		<div class="col-md-6">fdgs</div>
				  	</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>