<?php //Destruye todas las sessiones activas y redirecciona al index
session_start();
session_destroy();
header("location: ./../index.php");
?>