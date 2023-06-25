<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion(); //Instancia a la clase de Conexion;

//Recibiendo los datos del formulario y validando datos
if($_POST) {
 if( isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password']) ){
     $name = $_POST['name'];    $password = $_POST['password'];

//hacer query a la BD para confirmar si el usuario esta registrado
   $sql = "SELECT * FROM users_short WHERE name = '$name'";
   $resultados = $objConexion->consultar($sql);

   //Si esta registrado traer el ID del usuario y su nombre
  if($resultados) {
    foreach ($resultados as $resultado) {
       $passwordEncripted = $resultado['password'];
        if( password_verify($password, $passwordEncripted) ){
         $name = $resultado['name']; 
         $userID = $resultado['userID']; 
         //Eliminar la sesion que no esta logeado y redireccionar al home junto con su nombre y ID
         unset($_SESSION['no-log-in']);
         $_SESSION['userID'] = $userID;
         $_SESSION['log-in'] = $name;
         header('Location: ./../Home/home.php');
       }  
  }
 } else echo 'no estas registrado'; 
}
}
?>

<?php if($_SESSION['no-log-in']) { //Verificar que no este logeado?>
<!DOCTYPE html>
<html lang="es">
<head>
 <title>Iniciar Sesión</title>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="./../css/bootstrap.css">
</head>
<style>
  .form, .title {
    display: none;
  }
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
<body class="body container-fluid">
<h3 class="h3 text-center my-5 title">Inicie sesión para continuar</h3>

<div class="form container rounded-3 mt-4 p-4 bg-light mx-auto" style="width:350px;height:350px;box-shadow: 2px 2px 5px #003">
 <form method="POST">
 <div class="my-3">
  <label class>Nombre de Usuario</label>
  <input type="text" name="name" class="form-control" placeholder="Usuario" required>
</div>
<div class="my-3">
  <label>Contraseña</label>
  <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
</div>
<div class="mt-3 d-flex justify-content-center align-items-center">
  <input type="submit" class="btn btn-success mt-3 px-4" value="Ingresar">
</div>
<span class="text-center d-block mt-3" style="font-size: .9rem;">¿No Tienes una cuenta?
  <a href="./register.php" class="link-active" style="font-size:.9rem">Registrarme</a>
</span>
  <a href="./forgot-password.php" class="text-center d-block mt-1 link-active" style="font-size:.9rem">Olvide mi contraseña</a>
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