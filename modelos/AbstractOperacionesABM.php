<?php
	require_once "ConexionBaseDeDatos.php";

	abstract class AbstractOperacionesABM{
		protected $pdo;

		public function __construct(){
			$this->pdo = ConexionBaseDeDatos::connect();
		}

		abstract public function poblarPropiedades(array $datos);

		abstract public function save();
		
		abstract public function delete();

		abstract public function load($id);

		public function __destruct(){
			$this->pdo = ConexionBaseDeDatos::disconnect();
		}
	}
?>