<?php
	require_once "modelos/Usuarios.php";

	if(!empty($_REQUEST)){
		$usuario = new Usuarios();
		$usuario->poblarPropiedades($_REQUEST);
		$usuario->save();

		header("Location: http://localhost/senati4/index.php");
	}
?>