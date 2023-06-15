<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();

if($_POST) {
 if( isset($_POST['name']) && !empty($_POST['name']) && 
 	   isset($_POST['email']) && !empty($_POST['email']) && 
 	   isset($_POST['password']) && !empty($_POST['password']) &&
   	 isset($_POST['password-verify']) && !empty($_POST['password-verify'])) {

 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $passwordVerify = $_POST['password-verify'];

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
   header("Location: ./security-questions.php");
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
 <link rel="stylesheet" type="text/css" href="./../css/bootstrap.css">
 <meta charset="utf-8">
 <link rel="icon" href="./../media/user-plus.svg">
</head>
<body class="body">

<h3 class="h3 my-4 text-center">Registrese para continuar</h3>

<div class="container-form mt-3 bg-light p-4 rounded-3">
<form method="POST" class="form">
<div class="form-floating mb-3 p-0">
  <input type="text" name="name" class="form-control" id="floatingInput" placeholder="ej. Miguel" required>
  <label for="floatingInput">Nombre</label>
</div>
<div class="form-floating mb-3">
  <input type="email" name="email" class="form-control" id="floatingInput" placeholder="ej. Miguel@12gmail.com" required>
  <label for="floatingInput">Correo Electronico</label>
</div>
<div class="form-floating mb-3">
  <input type="password" name="password" class="password form-control" id="floatingInput" placeholder="contrasenia">
  <label for="floatingInput">Contraseña</label>
</div>
<div class="form-floating password-confirm">
  <input type="password" name="password-verify" class="password-confirm-input form-control" id="floatingPassword" placeholder="Confirmar Contraseña" required>
  <label for="floatingPassword">Confirmar Contraseña</label>
</div>
 <span class="span h6 my-2 mx-auto text-center" style="display:block"></span>
 <input type="submit" value="Enviar" class="btn-send mt-3 mx-auto" style="cursor: not-allowed">
 <span class="text-center d-block mt-3" style="font-size: .9rem;">¿Tienes una cuenta?</span>
  <a href="./log-in.php" class="text-center d-block p-0 link-active" style="font-size:.9rem">Iniciar Sesión</a>
</form>
</div>

<script src="./../js/classes.js"></script>
<script src="./../js/verify.js"></script>
<script type="text/javascript">
const body = document.querySelector('.body');
const h2 = document.querySelector('.h2');
const form = document.querySelector('.container-form');

cookies = document.cookie.split('; ');
cookie = [];
for(let i=0; i < cookies.length; i++){
 cookie = cookies[i].split('=');

  if(cookie[i] === 'colorFondo'){
    console.log(cookie)
   body.style.backgroundColor = cookie[1];
    if(cookie[1] === '#161b22'){
     h2.style.color = '#fff';
     form.style.boxShadow = '0 0 15px #2600ff';
    }
  }     
}
</script>
</body>
</html>

<?php

} else {
 header("Location: ./log-in.php");
}
 
?>