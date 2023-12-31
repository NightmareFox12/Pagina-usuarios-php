<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();

/*Recibiendo los datos y luego hacer un query a la BD para verificar si el usuario existe, 
en caso que exista redireccionar la pagina siguiente, en caso contrario mostrar un mensaje*/
if($_POST) {
  $name = $_POST['name']; $email = $_POST['email'];

  $sql = "SELECT * FROM users_short WHERE name = '$name' AND email = '$email'";
  $resultados = $objConexion->consultar($sql);

  //En caso que exista, recuperar su ID 
  if($resultados) {
     foreach($resultados as $resultado) {
      $_SESSION['userID'] = $resultado['userID'];
      }
      header('Location: ./forgot-password2.php');
  } else { ?>
   <div class="w-100 fixed-bottom text-center" style="background-color: #610708;height:40px;color:#fff">
    <h4 style="line-height: 40px">El usuario no existe</h4>
   </div>
 <?php }
 }
?>
<?php if( !isset($_SESSION['log-in']) ) { //Verificar que el usuario no este logeado?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="./../css/bootstrap.css">
</head>
<body class="body">
<style>
  
@keyframes aparecer {
	0% {
    opacity: 0;
    transform: translateX(-25px);
  }
	100% {
    opacity: 1;
    transform: translateX(0);
  }
}
</style> 
  <h3 class="h3 text-center my-5 title">Recuperación de contraseña</h3>
<div class="form container rounded-3 mt-4 p-4 bg-light mx-auto" style="width:350px;height:300px;box-shadow: 2px 2px 5px #003">
 <form method="POST">
 <div class="mb-3">
  <label>Nombre de usuario</label>
  <input type="text" name="name" class="form-control" placeholder="Usuario" required>
</div>
<div class="my-3">
  <label>Correo Electronico</label>
  <input type="email" name="email" class="form-control" placeholder="Correo electronico" required>
</div>
<div class="mt-3 d-flex justify-content-center align-items-center">
  <input type="submit" class="btn btn-success mt-3 px-4 in" value="Continuar">
</div>
  <a href="./register.php" class="text-center mt-3 d-block link-active" style="font-size:.9rem">Registrarme</a>
 </form>
</div>
<script src="./../js/background.js"></script>
</body>
</html>
<?php
} else {
    header('Location: ./../Home/home.php');
}
?>