<?php
if(isset($_POST['nombre'])) {

    require("conexion.php");

    // recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $pwd = $_POST["pwd"];

    // copia el archivo temporal en fotos con su nombre original
    //file_put_contents("fotos/$foto", file_get_contents($_FILES["foto"]["tmp_name"]));
    
    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "INSERT INTO usuario (nombre, pwd) values (:nombre, :pwd)";
    // asocia valores a esos nombres
    $datos = array("nombre" => $nombre,
                   "pwd" => $pwd
                  );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    if($stmt->execute($datos) != 1) {
        print("No se pudo dar de alta");
        exit(0);
    }
    header("Location: index.php");
    exit(0);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" id="nombre">
    <label for="pwd">Password: </label>
    <input type="text" name="pwd" id="pwd">
    <input type="submit" value="Enviar">
</form>    
</body>
</html>