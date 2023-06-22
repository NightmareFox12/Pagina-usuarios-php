<?php include './../globals/conexion.php'?>
<?php
session_start();
$objConexion = new Conexion();
$userID = $_SESSION['userID'];

$sql = "SELECT * FROM questions WHERE userID = '$userID'";
 $resultados = $objConexion->consultar($sql);
   foreach($resultados as $resultado) {
      $pregunta1 = $resultado['question1'];   $res1 = $resultado['res1'];
      $pregunta2 = $resultado['question2'];   $res2 = $resultado['res2'];
      $pregunta3 = $resultado['question3'];   $res3 = $resultado['res3'];
   }

if($_POST) { 
  if( isset($_POST['primera']) && !empty($_POST['primera']) && 
      isset($_POST['segunda']) && !empty($_POST['segunda']) &&
      isset($_POST['tercera']) && !empty($_POST['tercera']) ) {

        $primera = $_POST['primera'];
        $segunda = $_POST['segunda'];
        $tercera = $_POST['tercera'];

       if( password_verify($primera,$res1) && password_verify($segunda,$res2) && password_verify($tercera,$res3) ){
         header('Location: ./new-password.php');
       } else { ?>
        <div class="w-100 fixed-bottom text-center" style="background-color: #610708;height:40px;color:#fff">
        <h4 style="line-height: 40px">Respuestas incorrectas</h4>
       </div>
        <?php }
      }
}
?> 
<?php if( !isset($_SESSION['log-in']) ) { ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./../css/bootstrap.css">
  <title>Preguntas de seguridad</title>
</head>
<body class="body">
<h3 class="h3 text-center my-4">Preguntas de seguridad</h3>
<div class="form container rounded-3 mt-4 p-4 bg-light mx-auto" style="width:350px;height:400px;box-shadow: 2px 2px 5px #003">
 <form method="POST">
 <div class="my-3">
  <label><?php echo "¿{$pregunta1}?"?></label>
  <input type="text" name="primera" class="form-control" placeholder="Escriba su respuesta" required>
</div>
<div class="my-3">
  <label><?php echo "¿{$pregunta2}?"?></label>
  <input type="text" name="segunda" class="form-control" placeholder="Escriba su respuesta" required>
</div>
<div class="my-3">
  <label><?php echo "¿{$pregunta3}?"?></label>
  <input type="text" name="tercera" class="form-control" placeholder="Escriba su respuesta" required>
</div>
<div class="mt-3 d-flex justify-content-center align-items-center">
  <input type="submit" class="btn btn-success mt-3 px-4" value="Ingresar">
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