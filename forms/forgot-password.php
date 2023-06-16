<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();

if($_POST) {
  $name = $_POST['name']; $email = $_POST['email'];

  $sql = "SELECT * FROM users_short WHERE name = '$name' AND email = '$email'";
  $resultados = $objConexion->consultar($sql);
  foreach($resultados as $resultado) {
    $_SESSION['userID'] = $resultado['userID'];
    header('Location: ./forgot-password2.php');
  }
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
  <h4 class="h4 text-center my-5">Ingrese los datos para la recuperacion de contraseña</h4>
<div class="form container rounded-3 mt-4 p-4 bg-light mx-auto" style="width:320px;height:300px;box-shadow: 2px 2px 5px #003">
 <form method="POST">
 <div class="my-3">
  <label for="name">Nombre de usuario</label>
  <input type="text" name="name" class="form-control" placeholder="Usuario" required>
</div>
<div class="my-3">
  <label for="email">Correo Electronico</label>
  <input type="email" name="email" class="form-control" placeholder="Correo electronico" required>
</div>
<div class="mt-3 d-flex justify-content-center align-items-center">
  <input type="submit" class="btn btn-success mt-3 px-4 in" value="Ingresar">
</div>
  <a href="./register.php" class="text-center mt-3 d-block p-0 link-active" style="font-size:.9rem">Registrarme</a>
 </form>
</div>
</body>
</html>