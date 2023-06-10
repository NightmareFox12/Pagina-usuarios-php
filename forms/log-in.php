<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();

if($_POST) {
 if( isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password']) ){
  $name = $_POST['name']; $password = $_POST['password'];

   $sql = "SELECT userID, name, password FROM users_short WHERE name = '$name' AND password = '$password'";
   $resultados = $objConexion->consultar($sql);

  if($objConexion) {
   foreach ($resultados as $resultado) {
  	$name2 = $resultado['name'];
  	 $password2 = $resultado['password']; 
  	 $GLOBALS['userID'] = $resultado['userID'];

	 if($name2 === $name && $password === $password2) {
      $_SESSION["usuario"] = $name; $_SESSION["userID"] = $userID;
       unset($_SESSION['no-log-in']);
	   header("location: ./../Home/home.php?user=$name2");
	 } else {
	   	header("location: ./log-in-php");
	 }
  	}  
   }
  }
 }
?>

<?php
 if( isset($_SESSION['no-log-in']) && !isset($_SESSION['usuario']) ){
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <title>Iniciar Sesión</title>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="./../css/log-in.css">
</head>
<body>

<h2>Inicie sesión para continuar</h2>
<div class="form-container">
 <form method="POST">
  <input type="text" name="name" placeholder="Usuario">
  <input type="password" name="password" placeholder="Contraseña">

  <input type="submit">

  <h4><a href="./register.php">Registrarse</a></h4>
 </form>
</div>
</body>
</html>
<?php
} else {
 header('Location: ./../Home/home.php');
}
?>