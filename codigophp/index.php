<?php
require("testlogin.php");
require("conecta.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
</head>
<body>
    <header>
        <h1> LOS MEMES CORPORATION <h1>
        <?php $nombre = $_SESSION['nombre']; ?>
    </header>
    <main>
        <p>Mis memes</p>

        <?php
        $memes = $conn->query("SELECT * FROM memes WHERE id_usuario = (SELECT id FROM usuarios WHERE nombre = '$nombre')");
            if ($memes->rowCount() == 0){
                print("No hay memes");
            }
            else {
                while($meme = $memes->fetchObject()){
                print("<img width='125px'='200px' src='".$meme->ruta."' alt='".$meme->nombrememe."'>");
                print("<p>".$meme->nombrememe."</p>");
                }
            }
        ?>
        <p><a href=listadomemes.php>Crear Meme</a></p>
        <p><a href=logout.php>Desconectarse</a></p>
    </main>
    <footer>
    <a href="phpinfo.php">phpinfo()</a>
    <a href="xdebug_info.php">xdebug_info()</a> 
    </footer>
</body>
</html>