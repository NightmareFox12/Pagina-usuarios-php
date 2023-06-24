<?php include './../globals/conexion.php'?>
<?php
session_start();
//Extraer el userID del usuario actual
$objConexion = new Conexion();
$userID = $_SESSION['userID'];

//Recibir las contrasenias del usuario y guardarlas en sus respectivas variables
if($_POST) {
  if(isset($_POST['password']) && !empty($_POST['password']) && 
     isset($_POST['passwordVerify']) && !empty($_POST['passwordVerify']) ) {
        $password = $_POST['password'];   
        $passwordVerify = $_POST['passwordVerify'];
  
        //Verificar que las contrasenias ingresadas coincidan
      if($password === $passwordVerify) {
        //Encriptar la contrasenia actual y actualizarla
        $passwordNew = password_hash($password,PASSWORD_DEFAULT);
        $sql = "UPDATE users_short SET password = '$passwordNew' WHERE userID = '$userID'";
        $objConexion->ejecutar($sql);
        header('Location: ./log-in.php');
      } else { //Mostrar mensaje si las contrasenias ingresadas son incorrectas ?>
        <div class="w-100 fixed-bottom text-center" style="background-color: #610708;height:50px;color:#fff">
          <h4 style="line-height: 50px"><?php echo 'Contraseña Incorrecta'?></h4>
        </div>
      <?php }
  }
}
?>
<?php if( !isset($_SESSION['log-in']) ) {  //Verificar que el usuario no haya ingresado?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/bootstrap.css">
  <title>Contraseña nueva</title>
</head>
<body class="body">
<h3 class="h3 text-center my-4">Nueva contraseña</h3>
<div class="form container rounded-3 mt-4 p-4 bg-light mx-auto" style="width:350px;height:320px;box-shadow: 2px 2px 5px #003">
 <form method="POST">
 <div class="my-3">
  <label>Nueva contraseña</label>
  <input type="password" name="password" class="form-control" placeholder="Nueva contraseña" required>
</div>
<div class="my-3">
  <label>Confirme contraseña</label>
  <input type="password" name="passwordVerify" class="form-control" placeholder="Confirmar contraseña" required>
</div>
<div class="mt-3 d-flex justify-content-center align-items-center">
  <input type="submit" class="btn btn-success mt-3 px-4 in" value="Ingresar">
</div>
  <a href="./register.php" class="text-center mt-3 d-block p-0 link-active" style="font-size:.9rem">Registrarme</a>
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