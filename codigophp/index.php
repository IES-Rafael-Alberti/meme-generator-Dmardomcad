<?php
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
    <?php
    $meme = $conn->query("SELECT * FROM meme")
    if ($meme->rowCount() == 0){
        print(<p>'No hay memes'</p>);

    }
    print("<table class='memes'>");
    while($meme = $meme->fetchObject()){
        print("<tr>");
        print("<td>");
        print("<a href='borrarMeme.php?id=" . $user["id] . "'>);
        print("</td">);
        print("</tr>");
    }
    ?>
    <a href="phpinfo.php">phpinfo()</a>
    <a href="xdebug_info.php">xdebug_info()</a>
</body>
</html>