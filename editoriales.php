<!DOCTYPE html>
<html>
	<head>
		<title>Editoriales</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<h1 style="color:blue;">Editoriales</h1>
				<br>
					<a href="index.php">Regresar</a>
				<br>
			</div>
			<div class="row">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Acciones</th>
						</tr>
					</thead>

					<tbody>
						<?php
							require_once "modelos/ConexionBaseDeDatos.php";
							$pdo = ConexionBaseDeDatos::connect();
							$sql = "SELECT * FROM editorial ORDER BY id DESC";

							foreach($pdo->query($sql) as $row){
								echo "<tr>";
									echo "<td> {$row['id']} </td>";
									echo "<td> {$row['nombre_editorial']} </td>";
									echo "<td>  </td>";
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</div>	
	</body>
</html>