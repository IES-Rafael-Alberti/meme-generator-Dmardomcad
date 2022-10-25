<?php
if(isset($_POST['nombre'])) {

    require("conexion.php");

    // recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $edad = $_POST["pwd"];

    // copia el archivo temporal en fotos con su nombre original
    file_put_contents("fotos/$foto", file_get_contents($_FILES["foto"]["tmp_name"]));
    
    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "INSERT INTO usuario (nombre, edad, foto) values (:nombre, :edad, :foto)";
    // asocia valores a esos nombres
    $datos = array("nombre" => $nombre,
                   "edad" => $edad
                  );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    if($stmt->execute($datos) != 1) {
        print("No se pudo dar de alta");
        exit(0);
    }
    
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
    <label for="edad">Edad: </label>
    <input type="text" name="edad" id="edad">
    <input type="submit" value="Enviar">
</form>    
</body>
</html>