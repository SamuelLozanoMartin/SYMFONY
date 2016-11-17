<?php
	require_once('mvcConexion.php');
	class Usuario extends DBAbstractModel {
		 public $nombre;
		 public $apellido;
		 public $email;
		 private $clave;
		 protected $id;
		 function __construct() {
		 	$this->db_name = 'book_example';
		 }
		 public function getRows(){
		 	return $this->rows[0];
		 }
		 public function get($user_email='') {
			if($user_email!=""):
				 $this->query = "
				 SELECT  id, nombre, apellido, email, clave
				 FROM usuarios
				 WHERE email = '$user_email'
				 ";
				 $this->get_results_from_query();
			else:
				print "No has mandado ningun email a buscar!!!!";
			endif;
			if(count($this->rows) == 1):
				foreach ($this->rows[0] as $propiedad=>$valor):
				 	$this->$propiedad = $valor;
				endforeach;
			endif;
		 }
		 
		 
	}
?>