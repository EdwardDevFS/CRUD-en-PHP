<?php
	class ConexionBaseDeDatos{
		private static $nombreBaseDeDatos = "dbsenati";
		private static $nombreServidor = "localhost";
		private static $nombreUsuarioDB = "root";
		private static $password="";

		private static $conexionUnica = null;

		public static function connect(){
			if(self::$conexionUnica == null){
				try{
					self::$conexionUnica = new PDO("mysql:host=".self::$nombreServidor.";"."dbname=".self::$nombreBaseDeDatos,self::$nombreUsuarioDB, self::$password);
				}catch(PDOException $e){
					die($e->getMessage());
				}
			}
			return self::$conexionUnica;
		}

		public static function disconnect(){
			self::$conexionUnica = null;
		}

	}
?>