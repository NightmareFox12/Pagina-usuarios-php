<?php 
//variable de session que verifica si el usuario tiene una session activa, en caso que la tenga redireccionar
session_start();

if( isset($_SESSION['log-in']) || isset($_SESSION['usuario'])) {
 header("location: ./Home/home.php");
} else { 
  $_SESSION['no-log-in'] = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
 <title>Inicio</title>
 <link rel="stylesheet" type="text/css" href="./css/index.css">
 <link rel="stylesheet" type="text/css" href="./css/fonts.css">
 <link rel="stylesheet" type="text/css" href="./css/btn-dark.css">
 <meta charset="utf-8">
 <link rel="icon" href="./media/brand-google-home.svg">
</head>
<body class="body">

<div class="content">

<div class="container-dark">
  <div class="bg-btn">
   <input type="checkbox" class="checkbox" value="bg">
   <label>
    <i class="sun"><img src="./media/sun-low.svg"></i>
    <i class="moon"><img src="./media/moon.svg"></i>
  </label>
 </div>
</div>


<div class="container-btn">

 <a href="./forms/log-in.php" class="log-in"><span>Iniciar Sesión</span></a>
 <a href="./forms/register.php" class="register"><span>Registrarse</span></a>

</div>

</div>

<footer>
 <h4>Todos los derechos reservados. | 2023</h4>
</footer>
<script src="./js/mode-dark.js"></script>
</body>
</html>
<?php } ?>