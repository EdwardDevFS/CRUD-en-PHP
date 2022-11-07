<!DOCTYPE html>
<html>
	<head>
		<title>Usuarios</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h1 style="color:blue;">Usuarios</h1>
				<br>
					<a href="editoriales.php">Editoriales</a>
					<br>
					<a href="libros.php">Libros</a>
				<br>
				<br>
				<br>
					<a class="btn btn-success" href="crear_usuario.php">Crear Usuario</a>
			</div>
			<div class="row">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Nombre Usuario</th>
							<th>Correo Electronico</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Edad</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<tbody>
						<?php
							require_once "modelos/ConexionBaseDeDatos.php";
							$pdo = ConexionBaseDeDatos::connect();
							$sql = "SELECT * FROM usuarios ORDER BY id DESC";

							foreach($pdo->query($sql) as $row){
								echo "<tr>";
									echo "<td> {$row['nombre_usuario']} </td>";
									echo "<td> {$row['email']} </td>";
									echo "<td> {$row['nombre']} </td>";
									echo "<td> {$row['apellidos']} </td>";
									echo "<td> {$row['fecha_nacimiento']} </td>";
									echo "<td> 
										<a class='btn btn-default' href='mostrar_usuario.php?id={$row['id']}'>Mostrar</a>
										<a class='btn btn-success' href='crear_usuario.php?id={$row['id']}'>Actualizar</a>
										<a class='btn btn-danger' href='eliminar_usuario.php?id={$row['id']}'>Eliminar</a>
									 	</td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>	
	</body>
</html>