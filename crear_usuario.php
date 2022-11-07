<?php
	require_once "modelos/Usuarios.php";
	$usuario = new Usuarios();

	if(!empty($_GET)){
		$usuario->load($_GET['id']);
	}else{
		$usuario->poblarPropiedades(array());
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Crear Usuario</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form action="procesar_usuario.php" data-toggle="validator" method="POST">
						<input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
						<fieldset>
							<div class="legend">
								<legend>Registro de Usuarios</legend>
							</div>

							<div class="form-group">
								<label class="control-label" for="nombre_usuario">Nombre Usuario</label>
								<div class="controls">
									<input id="nombre_usuario" value="<?php echo $usuario->getNombreUsuario(); ?>" name="nombre_usuario" class="form-control input-lg" type="text" data-error="Campo requerido" required>
									<div class="help-block with errors"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label" for="email">Email</label>
								<div class="controls">
									<input id="email" value="<?php echo $usuario->getEmail(); ?>" name="email" class="form-control input-lg" type="email" data-error="Campo requerido" required>
									<div class="help-block with errors"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label" for="nombre">Nombre</label>
								<div class="controls">
									<input id="nombre" value="<?php echo $usuario->getNombre(); ?>" name="nombre" class="form-control input-lg" type="text" data-error="Campo requerido" required>
									<div class="help-block with errors"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label" for="apellidos">Apellidos</label>
								<div class="controls">
									<input id="apellidos" value="<?php echo $usuario->getApellidos(); ?>" name="apellidos" class="form-control input-lg" type="text" data-error="Campo requerido" required>
									<div class="help-block with errors"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label" for="fecha_nacimiento">Fecha Nacimiento</label>
								<div class="controls">
									<input id="fecha_nacimiento" value="<?php echo $usuario->getFechaNacimiento(); ?>" name="fecha_nacimiento" class="form-control input-lg" type="date" data-error="Campo requerido" required>
									<div class="help-block with errors"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<div class="controls">
									<input id="password" value="" name="password" class="form-control input-lg" type="password" data-error="Campo requerido" required>
									<div class="help-block with errors"></div>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label" for="passwordconfirm">Volver a escribir el Password</label>
								<div class="controls">
									<input id="passwordconfirm" value="" data-match-error="Los passwords no coinciden" data-match="#password" name="passwordconfirm" class="form-control input-lg" type="password" data-error="Campo requerido" required>
									<div class="help-block with errors"></div>
								</div>
							</div>

							<div class="form-group">
								<div class="controls">
									<button class="btn btn-success">Registrar</button>
								</div>
							</div>

						</fieldset>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/validator.min.js"></script>
	</body>
</html>