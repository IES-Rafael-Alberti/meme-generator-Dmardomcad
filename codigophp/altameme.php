<?php 
echo "<img width=30% src='$_GET[url]'><br>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir imagen</title>
</head>

<body>
    <?php $text_boxes = $_GET['cajas'];?>
    <form action="meme.php" method="post">
        <?php $template_id=$_GET["id"]; ?>
        <?php $cajas = $_GET["cajas"]; ?>

        <input type="hidden" name="id" value="$template_id">
        <input type="hidden" name="meme_box" value="$cajas">
        <?php
        for($i=1;$i<=$text_boxes;$i++){
            print("<input type='text' name='text_meme$i'>");

        }
        ?>
        <input type="submit" value="Crear Meme">
    </form>

</body>

</html>