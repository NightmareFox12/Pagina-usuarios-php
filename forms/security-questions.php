<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new conexion();
$userID = $_SESSION['userID'];

if($_POST) {
 if( isset($_POST['first-question']) && isset($_POST['res1']) && !empty($_POST['res1']) && 
     isset($_POST['second-question']) && isset($_POST['res2']) && !empty($_POST['res2']) && 
     isset($_POST['third-question']) && isset($_POST['res3']) && !empty($_POST['res3']) ) {

        $res1 = $_POST['res1'];   $question1 = $_POST['first-question'];
        $res2 = $_POST['res2'];   $question2 = $_POST['second-question'];
        $res3 = $_POST['res3'];   $question3 = $_POST['third-question'];

        $res1Encripted = password_hash($res1,PASSWORD_DEFAULT); 
        $res2Encripted = password_hash($res2,PASSWORD_DEFAULT);
        $res3Encripted = password_hash($res3,PASSWORD_DEFAULT);

        $sql = "INSERT INTO questions(userID,question1,res1,question2,res2,question3,res3) VALUES ('$userID','$question1','$res1Encripted','$question2','$res2Encripted','$question3','$res3Encripted')";
         $objConexion->ejecutar($sql);
          header('Location: ./log-in.php');
 } else {
   header('Location: ./security-questions.php');
 }
}
?>

<?php if( isset($_SESSION['userID']) ) { ?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="./../css/bootstrap.css">
 <title>Registrarse</title>
</head>
<body class="container body">
<style>
@keyframes aparecer {
  0% {transform: translateX(20px)}
  100% {transform: translateX(0)}
}
</style>
<h4 class="title text-center my-2">Preguntas de seguridad</h4>
<div class="form mt-3 bg-light p-4 rounded-3 mx-auto" style="width: 400px;display: none">
<form method="POST">

<select class="form-select s-1" aria-label="Select questions" name="first-question">
  <option selected>Selecciona una pregunta</option>
  <option value="name-first-pet">¿Cuál fue tu primera mascota?</option>
  <option value="city-friend-infancy">¿En qué ciudad nació tu mejor amigo/a de la infancia?</option>
  <option value="food-fav">¿Cuál es tu comida favorita?</option>
  <input class="form-control mt-2 in-1" name="res1" type="text" placeholder="Escriba su respuesta" aria-label="input option" style="display: none" required>
</select>
<select class="form-select s-2 mt-4" aria-label="Select questions" name="second-question">
  <option selected>Selecciona una pregunta</option>
  <option value="color-fav">¿Cuál es tu color favorito?</option>
  <option value="sport-fav">¿Cuál es tu deporte favorito?</option>
  <option value="song-fav">¿Cuál es tu canción favorita?</option>
  <input class="form-control mt-2 in-2" name="res2" type="text" placeholder="Escriba su respuesta" aria-label="input option" style="display: none" required>
</select>
<select class="form-select s-3 mt-4" aria-label="Select questions" name="third-question">
  <option selected>Selecciona una pregunta</option>
  <option value="book-fav">¿Cuál es tu libro favorito?</option>
  <option value="actress-fav">¿Cuál es el nombre de tu actor o actriz favorito/a?</option>
  <option value="moovie-fav">¿Cuál es el nombre de tu película favorita?</option>
  <input class="form-control mt-2 in-3" name="res3" type="text" placeholder="Escriba su respuesta" aria-label="input option" style="display: none" required>
</select>

<input type="submit" class="btn btn-primary mx-auto d-block px-3 my-3">
  <a href="./log-in.php" class="text-center d-block p-0 link-active" style="font-size:.9rem">Iniciar Sesión</a>
</form>
</div>
<script src="./../js/security-questions.js"></script>
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
<?php
} else {
  header('Location: ./../index.php');
}
?>
