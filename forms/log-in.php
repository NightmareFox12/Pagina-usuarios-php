<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();

//Recibiendo los datos del formulario y validando datos
if($_POST) {
 if( isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['password']) && !empty($_POST['password']) ){
     $name = $_POST['name'];    $password = $_POST['password'];

//hacer query a la BD para confirmar si el usuario esta registrado
   $sql = "SELECT * FROM users_short WHERE name = '$name'";
   $resultados = $objConexion->consultar($sql);

  if($resultados) {
    foreach ($resultados as $resultado) {
       $passwordEncripted = $resultado['password'];
        if( password_verify($password, $passwordEncripted) ){
         $name = $resultado['name']; 
         $userID = $resultado['userID']; 

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

<?php if($_SESSION['no-log-in']) {
  
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <title>Iniciar Sesión</title>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="./../css/bootstrap.css">
</head>
<body class="body container-fluid">
<!--de ahi crear el login y el recuperar contrasenia-->
<h3 class="h3 text-center my-4">Inicie sesión para continuar</h3>

<div class="form container rounded-3 mt-4 p-4 bg-light mx-auto" style="width:320px;height:300px;box-shadow: 2px 2px 5px #003">
 <form method="POST">
 <div class="my-3">
  <input type="text" name="name" class="form-control" placeholder="Usuario" required>
</div>
<div class="my-3">
  <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
</div>
<div class="mt-3 d-flex justify-content-center align-items-center">
  <input type="submit" class="btn btn-success mt-3 px-4" value="Ingresar">
</div>
  <a href="./register.php" class="text-center mt-3 d-block p-0 link-active" style="font-size:.9rem">Registrarme</a>
  <a href="./forgot-password.php" class="text-center d-block p-0 link-active" style="font-size:.9rem">Olvide mi contraseña</a>
 </form>
</div>

<script type="text/javascript">
const body = document.querySelector('.body');
const h3 = document.querySelector('.h3');
const form = document.querySelector('.form');

cookies = document.cookie.split('; ');
cookie = [];
for(let i=0; i < cookies.length; i++){
 cookie = cookies[i].split('=');

  if(cookie[i] === 'colorFondo'){
    console.log(cookie)
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
} else {
  header('Location: ./../Home/home.php');
}
?>