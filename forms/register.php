<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();

if($_POST) {
 if( isset($_POST['name']) && !empty($_POST['name']) && 
 	   isset($_POST['email']) && !empty($_POST['email']) && 
 	   isset($_POST['password']) && !empty($_POST['password']) &&
   	 isset($_POST['password-verify']) && !empty($_POST['password-verify'])) {

 $name = $_POST['name']; $email = $_POST['email'];
 $password = $_POST['password-verify']; $passwordVerify = $_POST['password-verify'];

 $contraseniaEncriptada = password_hash($password, PASSWORD_DEFAULT);
 $contraseniaEncriptada2 = password_hash($passwordVerify, PASSWORD_DEFAULT);
   

  if(password_verify($password,$contraseniaEncriptada) === password_verify($passwordVerify,$contraseniaEncriptada2)){

$sql = "SELECT email FROM users_short";
$resultados = $objConexion->consultar($sql);

    if($objConexion) {
     foreach ($resultados as $resultado) {
      if($resultado['email'] !== $email) $repeat = false;
      else $repeat = true;
 }
 
 if($repeat) { ?>
<div class="incorrect">
 <h4 class="incorrect-text"><?php echo 'El Correo Electronico ya esta registrado a otro usuario';?></h4>
</div>
<?php 
  header("./register.php");
 } else {
 $sql = "INSERT INTO users_short(name,email,password) VALUES ('$name','$email','$password')";
 $objConexion->ejecutar($sql);
  
 $_SESSION['log-in'] = $name;
 header("Location: ./log-in.php");
    }
   }
  }
 }
}

?>

<?php 
if( isset($_SESSION['no-log-in'])) {

?>
<!DOCTYPE html>
<html lang="es">
<head>
 <title>Registrarse</title>
 <link rel="stylesheet" type="text/css" href="./../css/register.css">
 <link rel="stylesheet" type="text/css" href="./../css/fonts.css">
 <meta charset="utf-8">
 <link rel="icon" href="./../media/user-plus.svg">
</head>
<body class="body">

<h2 class="h2">Registrese para continuar</h2>
 
 <!--<div class="container-dark">
  <div class="bg-btn">
   <input type="checkbox" class="checkbox">
   <label>
    <i class="sun"><img src="./../media/sun-low.svg"></i>
    <i class="moon"><img src="./../media/moon.svg"></i>
  </label>
 </div>
</div>
-->
<div class="container-form">
<form method="POST" class="form">
 <input type="text" name="name" placeholder="Nombre"  value="" required="">
 <input type="email" name="email" placeholder="Correo Electronico" value="" required="" >
 <input type="password" name="password" class="password" placeholder="Contraseña" value="" required="" >
 <input type="password" name="password-verify" class="password-confirm" placeholder="Confirmar Contraseña" value="" required="">
 <span class="span"></span>

 <input type="submit" value="Enviar" class="btn-send">
 <h4><a href="./log-in.php">Iniciar Sesión</a></h4>
</form>
</div>

<script src="./../js/classes.js"></script>
<script src="./../js/verify.js"></script>

<script type="text/javascript">
const body = document.querySelector('.body');
const h2 = document.querySelector('.h2');

let cookies = document.cookie.split('; ');
let cookie = cookies[1].split('=');

body.style.backgroundColor = cookie[1];

if(cookie[1] === '#001'){
  h2.style.color = '#fff';
 
}

</script>
</body>
</html>

<?php

} else {
 header("Location: ./log-in.php");

}
 
?>