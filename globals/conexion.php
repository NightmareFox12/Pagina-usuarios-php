<?php

class conexion {

  private $host = 'localhost';
  private $user = 'NightmareFox';
  private $password = '';
  private $database = 'users_php';
  private $listo;

  public function __construct() {

   try {
     $this->listo = new PDO("mysql:host=$this->host;dbname=$this->database",$this->user,$this->password);
     $this->listo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   }
   catch(PDOException $e ){
      return "fallo la conexion".$e;
  	}
  }
  public function ejecutar($sql) { //insertar/delete/update
    $this->listo->exec($sql);
    return $this->listo->lastInsertId();//regresa un ID de insertado
  }

  public function consultar($sql) {
    $consulta=$this->listo->prepare($sql); //Ejecutar la instruccion y devuelve la info
    $consulta->execute();
    return $consulta->fetchAll(); //retorna todos los registros
  }

}

?>