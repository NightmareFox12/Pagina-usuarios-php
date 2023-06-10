<?php
session_start();
if($_SESSION) { ?>


<!DOCTYPE html>
<html>
<head>
 <title>Imágen de Perfil</title>
 <meta charset="utf-8">
 <link rel="stylesheet" type="text/css" href="./../css/change-image.css">
</head>
<body>

<div class="container">
<?php
if($_POST) {
  move_uploaded_file($_FILES["image"]["tmp_name"],"./../media/images/".$_FILES["image"]["name"]);
  $image = $_FILES["image"]["name"];
?>

 <div class="container-image">
  <img src="<?php echo "./../media/images/".$_FILES["image"]["name"]?>">
 </div>
<?php 
} else { ?>
 <div class="container-image">
  <img src="./../media/no-user.png">
 </div>
<?php } ?>
 <form method="POST" enctype="multipart/form-data">
  <input type="file" name="image" accept="image/*,.gif">
  <input type="submit" name="btn-send">
 </form>

</div>


</body>
</html>

<?php } else { }?>
