<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();

if($_POST) {
  $name = $_POST['name']; $email = $_POST['email'];

  $sql = "SELECT * FROM users_short WHERE name = '$name' AND email = '$email'";
  $resultados = $objConexion->consultar($sql);

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

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link rel="stylesheet" href="./../css/bootstrap.css">
</head>
<body>
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
<div class="form container rounded-3 mt-4 p-4 bg-light mx-auto" style="width:320px;height:300px;box-shadow: 2px 2px 5px #003">
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
<script>
const form = document.querySelector('.form');
const title = document.querySelector('.title');

addEventListener('load',()=>{
  form.style.display = 'block';
  title.style.display = 'block';
  form.style.animation = 'aparecer .8s forwards';
  title.style.animation = 'aparecer .8s forwards';
});
</script>
</body>
</html>