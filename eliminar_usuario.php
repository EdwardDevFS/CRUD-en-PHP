<?php
	require_once "modelos/Usuarios.php";
	$usuario = new Usuarios();

	if(!empty($_GET)){
		$usuario->load($_GET['id']);
	}

	if(!empty($_POST)){
		$usuario->load($_POST['id']);
		$usuario->delete();
		header('Location: http://localhost/senati4/index.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Eliminar Usuario</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
	</head>
	<body>
		<div class="container">
			<div class="span10 offset1">
				<div class="row">
					<h3>Eliminar Usuario</h3>
				</div>
			</div>

			<form class="form-horizontal" action="eliminar_usuario.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $usuario->getId(); ?>">
				<p class="alert alert-error">Est&aacute;s seguro de Eliminar al usuario
						<?php
							echo $usuario->getNombreUsuario();
						?>
				</p>

				<div class="form-actions">
						<button type="submit" class="btn btn-danger">Si</button>
						<a class="btn btn-default" href="http://localhost/senati4/index.php">No</a>
				</div>
			</form>
		</div>
	</body>
</html>