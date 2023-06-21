<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();

//Verificar que los datos enviados en el formulario sean validos y no esten vacios
if($_POST) {
 if( isset($_POST['name']) && !empty($_POST['name']) && 
 	   isset($_POST['email']) && !empty($_POST['email']) && 
 	   isset($_POST['password']) && !empty($_POST['password']) &&
   	 isset($_POST['password-verify']) && !empty($_POST['password-verify'])) {

  //Asignar los datos a variables con el mismo nombre
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $passwordVerify = $_POST['password-verify'];
  
  //Encriptamiento de contrasenias
 $contraseniaEncriptada = password_hash($password, PASSWORD_DEFAULT);
 $contraseniaEncriptada2 = password_hash($passwordVerify, PASSWORD_DEFAULT);
   /*Verificar que las contrasenias sean correctas, en caso que lo sean, confirmar que el correo no este regitrado a otro usuario*/
  if(password_verify($password,$contraseniaEncriptada) === password_verify($passwordVerify,$contraseniaEncriptada2)){

    $sql = "SELECT email FROM users_short WHERE email = '$email'";
    $result = $objConexion->consultar($sql);
      if($result) $repeat = true;
      else $repeat = false;
    /*Si esta repetido mostrar un mensaje, en caso contrario enviarlo al siguiente formulario registrando
    los datos
    */
 if($repeat) { ?>
<div class="w-100 fixed-bottom text-center" style="background-color: #610708;height:50px">
 <h4 class="incorrect-text"><?php echo 'El Correo Electronico ya esta registrado a otro usuario'?></h4>
</div>
<?php 
   header("./register.php");
 } else {
    $sql = "INSERT INTO users_short(`name`,`email`,`password`) VALUES ('$name','$email','$contraseniaEncriptada')";
    $userID = $objConexion->ejecutar($sql);
    header("Location: ./security-questions.php");
    $_SESSION['userID'] = $userID;
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
</head>
<body class="body">
<h3 class="h3 my-4 text-center title">Registrese para continuar</h3>

<div class="container-form mt-4 bg-light p-4 rounded-3">
<form method="POST" class="form">
<div class="mb-3">
  <label>Nombre</label>
  <input type="text" name="name" class="form-control" placeholder="ejem. Miguel" required>
</div>
<div class="mb-3">
  <label>Correo Electronico</label>
  <input type="email" name="email" class="form-control" placeholder="ejem. Miguel@12gmail.com" required>
</div>
<div class="mb-3">
  <label>Contraseña</label>
  <input type="password" name="password" class="password form-control" placeholder="ejem. Turkia12*">
</div>
<div class="password-confirm">
  <label>Confirmar Contraseña</label>
  <input type="password" name="password-verify" class="password-confirm-input form-control" placeholder="ejem. Turkia12*" required>
</div>
 <span class="span h6 my-2 mx-auto text-center" style="display:block"></span>
 <input type="submit" value="Continuar" class="btn-send btn mt-3 mx-auto px-4" style="cursor: not-allowed;">
 <span class="text-center d-block mt-3" style="font-size: .9rem;">¿Tienes una cuenta?
  <a href="./log-in.php" class="link-active" style="font-size:.9rem">Iniciar Sesión</a>
 </span>
</form>
</div>

<script src="./../js/classes.js"></script>
<script src="./../js/verify.js"></script>

<script type="text/javascript">
const body = document.querySelector('.body');
const h3 = document.querySelector('.h3');
const form = document.querySelector('.container-form');

cookies = document.cookie.split('; ');
cookie = [];
for(let i=0; i < cookies.length; i++){
 cookie = cookies[i].split('=');

  if(cookie[i] === 'colorFondo'){
    body.style.backgroundColor = cookie[1];
      if(cookie[1] === '#161b22'){
        h3.style.color = '#fff';
        form.style.boxShadow = '0 0 15px #2600ff';
    }
  }     
}
</script>
</body>
</html>

<?php
} else header("Location: ./log-in.php");
?>