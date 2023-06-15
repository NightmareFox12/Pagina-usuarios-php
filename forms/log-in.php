<?php include './../globals/conexion.php'?>
<?php
session_start();
print_r($_SESSION);
$objConexion = new conexion();

//Recibiendo los datos del formulario y validando
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
         echo $resultado['name']; 
         echo $resultado['userID']; 

         //unset($_SESSION['no-log-in']);
         //header('./../Home/home.php?name=$user');
       } 
  }
 } else echo 'no estas registrado'; 
}
}
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
<h2 class="h3 text-center my-2">Inicie sesión para continuar</h2>

<div class="container rounded-3 mt-3 p-3 bg-light mx-auto" style="width:300px;height:400px">
 <form method="POST">
 <div class="mb-3">
  <label for="name" class="form-label">Usuario:</label>
  <input type="text" name="name" class="form-control" placeholder="Usuario" required>
</div>
<div class="mb-3">
  <label for="password" class="form-label">Email address</label>
  <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
</div>
 </form>
</div>

<script type="text/javascript">
const body = document.querySelector('.body');
const h4 = document.querySelector('.title');
const form = document.querySelector('.form');

cookies = document.cookie.split('; ');
cookie = [];
for(let i=0; i < cookies.length; i++){
 cookie = cookies[i].split('=');

  if(cookie[i] === 'colorFondo'){
    console.log(cookie)
   body.style.backgroundColor = cookie[1];
    if(cookie[1] === '#161b22'){
     h4.style.color = '#fff';
     form.style.boxShadow = '0 0 15px #2600ff';
    }
  }     
}
</script> 
</body>
</html>