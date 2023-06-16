<?php
if($POST) {
   print_r($POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña nueva</title>
</head>
<body>
<div class="form container rounded-3 mt-4 p-4 bg-light mx-auto" style="width:320px;height:300px;box-shadow: 2px 2px 5px #003">
 <form method="POST">
 <div class="my-3">
  <input type="password" name="password" class="form-control" placeholder="Usuario" required>
</div>
<div class="my-3">
  <input type="password" name="passwordVerify" class="form-control" placeholder="Correo electronico" required>
</div>
<div class="mt-3 d-flex justify-content-center align-items-center">
  <input type="submit" class="btn btn-success mt-3 px-4 in" value="Ingresar">
</div>
  <a href="./register.php" class="text-center mt-3 d-block p-0 link-active" style="font-size:.9rem">Registrarme</a>
 </form>
</div>
</body>
</html>










