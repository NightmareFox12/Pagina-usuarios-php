<?php include './../globals/conexion.php'?>
<?php
session_start();
if($_SESSION['usuario']) { 
  $usuario = $_SESSION['usuario']; 
  print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="es">
<head>
 <title>Inicio</title>
 <link rel="stylesheet" type="text/css" href="./../css/home.css">
 <link rel="stylesheet" type="text/css" href="./../css/fonts.css">
 <meta charset="utf-8">
</head>
<body>

 <header>
  <nav>
   <ul>
 	<li><a href="#">Inicio</a></li>
 	<li><a href="#">Notas</a></li>
 	<li><a href="./edit-perfil.php?user=<?php echo $usuario?>">Perfil</a></li>
   </ul>
  </nav>
 </header>
 
</body>
</html>
<script type="text/javascript">
let titulo = document.title;

addEventListener('focus',()=>{
  document.title = titulo;
});

addEventListener('blur',()=>{
 document.title ='No te vayas :(';
});
</script>

<?php
} else header("location: ./../forms/register.php");
?>
