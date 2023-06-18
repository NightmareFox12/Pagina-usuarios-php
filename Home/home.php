<?php include './../globals/conexion.php'?>
<?php session_start(); ?>

<?php if( isset($_SESSION['log-in']) ) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="./../css/bootstrap.css">
</head>
<body>
<nav class="navbar" style="background-color: #ccc">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Inicio</a>
    <span class="navbar-text me-2">
       <a href="./edit-perfil.php" class="link-active"><?php echo $_SESSION['log-in']?></a>
    </span>
</nav>
</body>
</html>
<?php 
} else {
   header('Location: ./../index.php');
}
?>