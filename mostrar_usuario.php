<?php
	require_once "modelos/Usuarios.php";

	if(!empty($_GET)){
		$usuario = new Usuarios();
		$usuario->load($_GET['id']);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Mostrar Usuario</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
	</head>
	<body>
		<div class="container">
			<div class="spa10 offset1">
				<div class="row">
					<h1>Mostrar Usuario</h1>
				</div>

				<div class="form-horizontal">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Nombre de Usuario:</label>
						<div class="col-sm-10">
							<label class="checkbox">
								<?php
									echo $usuario->getNombreUsuario();
								?>
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Direcci&oacute;n de correo:</label>
						<div class="col-sm-10">
							<label class="checkbox">
								<?php
									echo $usuario->getEmail();
								?>
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Nombre:</label>
						<div class="col-sm-10">
							<label class="checkbox">
								<?php
									echo $usuario->getNombre();
								?>
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Apellidos:</label>
						<div class="col-sm-10">
							<label class="checkbox">
								<?php
									echo $usuario->getApellidos();
								?>
							</label>
						</div>
					</div>

					<div class="form-actions">
						<a class="btn btn-default" href="http://localhost/senati4/index.php">Regresar a Inicio</a>
					</div>

				</div>
			</div>
		</div>
	</body>
</html>