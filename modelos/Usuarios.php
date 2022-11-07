<?php
	require_once "AbstractOperacionesABM.php";

	class Usuarios extends AbstractOperacionesABM{
		private $id;
		private $nombre_usuario;
		private $email;
		private $password;
		private $nombre;
		private $apellidos;
		private $fecha_nacimiento;

		private $ultimoId;

		public function __construct(){
			parent::__construct();
		}

		public function poblarPropiedades(array $datos){
			$this->id = isset($datos['id']) ? trim($datos['id']) : 0;
			$this->nombre_usuario = isset($datos['nombre_usuario']) ? trim($datos['nombre_usuario']) : null;
			$this->email = isset($datos['email']) ? trim($datos['email']) : null;
			$this->password = isset($datos['password']) ? trim($datos['password']) : null;
			$this->nombre = isset($datos['nombre']) ? trim($datos['nombre']) : null;
			$this->apellidos = isset($datos['apellidos']) ? trim($datos['apellidos']) : null;
			$this->fecha_nacimiento = isset($datos['fecha_nacimiento']) ? trim($datos['fecha_nacimiento']) : null;
		}

		public function save(){
			$this->PDOAttribute();
			if($this->id==0){
				$sql = "INSERT INTO usuarios(id, nombre_usuario, email, password, nombre, apellidos, fecha_nacimiento) VALUES(?,?,?,?,?,?,?)";
				$sqlInsertDatos = $this->pdo->prepare($sql);
				$sqlInsertDatos->execute(array(null,//para que haga un auto increment
										$this->nombre_usuario,
										$this->email,
										$this->password,
										$this->nombre,
										$this->apellidos,
										$this->fecha_nacimiento
										));
				$this->ultimoId=$this->pdo->lastInsertId();
			}else{
				//actualizar el registro
				$sql = "UPDATE usuarios
							SET nombre_usuario = ?,
								email = ?,
								password = ?,
								nombre = ?,
								apellidos = ?,
								fecha_nacimiento = ?
						WHERE id = ?";
				$sqlUpdateDatos = $this->pdo->prepare($sql);
				$sqlUpdateDatos->execute(array(	$this->nombre_usuario,
												$this->email,
												$this->password,
												$this->nombre,
												$this->apellidos,
												$this->fecha_nacimiento,
												$this->id));
			}
		}

		public function load($id){
			$sql = "SELECT * FROM usuarios WHERE id = ?";
			$sqlSelect = $this->pdo->prepare($sql);
			$sqlSelect->execute(array($id));
			$data = $sqlSelect->fetch(PDO::FETCH_ASSOC);
			foreach($data as $indice => $valor){
				$this->$indice = $valor;
			}
		}

		public function getId(){
			return $this->id;
		}

		public function getNombreUsuario(){
			return $this->nombre_usuario;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getNombre(){
			return $this->nombre;
		}

		public function getApellidos(){
			return $this->apellidos;
		}

		public function getFechaNacimiento(){
			return $this->fecha_nacimiento;
		}

		private function PDOAttribute(){
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		//Implementar la función/método delete
		public function delete(){
			$this->PDOAttribute();
			$sql = "DELETE FROM usuarios WHERE id = ?";
			$sqlEliminar = $this->pdo->prepare($sql);
			$sqlEliminar->execute(array($this->id));
			$this->load(array());
		}

		public function __destruct(){
			parent::__destruct();
		}

	}
?>