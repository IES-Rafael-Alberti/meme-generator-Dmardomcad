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
<?php
$id=$_GET["id"];
$url=$_GET["url"];
$cajas=$_GET["cajas"];
?>
    <form action="meme.php" method="post">
        <input type="hidden" name="id" value=<?php echo "$id";?>>
        <input type="hidden" name="url" value=<?php echo "$url";?>>
        <input type="hidden" name="cajas" value=<?php echo "$cajas";?>>
        <?php
        for($i=1;$i<=$cajas;$i++){
            print("<input type='text' name='cajas$i'>");

        }
        ?>
        <input type="submit" value="Crear Meme" action="meme.php">
    </form>

</body>
</html>