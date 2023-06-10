<?php include './../globals/conexion.php' ?>
<?php
session_start();
if($_SESSION) {

 $objConexion = new Conexion();
 $userActualId = $_SESSION['userID'];

$sql = "SELECT * FROM users_short WHERE userID = '$userActualId'";

$resultados = $objConexion->consultar($sql);
?>
<!DOCTYPE html>
<html>
<head>
 <title><?php echo $_SESSION['usuario']?></title>
 <link rel="stylesheet" type="text/css" href="./../css/footer.css">
 <link rel="stylesheet" type="text/css" href="./../css/edit-perfil.css">
 <link rel="stylesheet" type="text/css" href="./../css/fonts.css">
 <meta charset="utf-8">
</head>
<body>

<header>
 <nav>
  <ul>
   <li><a href="./home.php">Inicio</a></li>
   <li><a href="#">Notas</a></li>
  </ul>
 </nav>	
</header>

<content class="content-changes">

 <div class="img-container">
  <div class="img-content">
   <img src="./../media/no-user.png">
  </div>
   <span class="btn-position">
    <button><a href="./change-image.php?id=<?php echo $userActualId?>"><img src="./../media/photo-edit.svg"></a></button>
   </span>	
 </div>
<?php if($objConexion) {
 foreach ($resultados as $resultado) {
 	$name = $resultado['name'];
 	$email = $resultado['email'];
 	$password = $resultado['password'];
 }
}
?>
 <div class="form-container">
  <form method="POST">
   <textarea cols="20" rows="5" placeholder="Escriba una descripcion breve"></textarea>
   <input type="text" name="nameUpdate" value="<?php echo $name ?>">
   <input type="email" name="emailUpdate" value="<?php echo $email ?>">
   <input type="text" name="passwordUpdate" value="<?php echo $password ?>">

   <input type="submit" value="Guardar cambios">
  </form>
 </div>

</content>
<?php echo $userActualId;
if($_POST) {
 if( isset($_POST['nameUpdate']) && !empty($_POST['nameUpdate']) && isset($_POST['emailUpdate']) && !empty($_POST['emailUpdate']) && isset($_POST['passwordUpdate']) && !empty($_POST['passwordUpdate'])) {
   $nameUpdate = $_POST['nameUpdate'];
   $emailUpdate = $_POST['emailUpdate'];
   $passwordUpdate = $_POST['passwordUpdate'];
;
 $sql = "UPDATE users_short SET name = '$nameUpdate', email = '$emailUpdate', password = '$passwordUpdate' WHERE userID = '$userActualId'";
 $objConexion->ejecutar($sql);

   header("location: ./edit-perfil.php");
 }
}
?>

<button><a href="./../globals/delete-sesion.php">Cerrar Sesión</a></button>

<script type="text/javascript">
 const bntEdit = document.querySelector(".btn-position");

</script>
<?php include './footer.php' ?>
<?php } else { 
	header("location: ./../index.php");
}?>
