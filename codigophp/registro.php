<?php
if(isset($_POST['nombre'])) {

    require("conecta.php");

    // recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $pwd = $_POST["pwd"];
    
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
    header("Location: login.php");
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
    <label for="pwd">Contraseña: </label>
    <input type="password" name="pwd" id="pwd">
    <input type="submit" value="Enviar">
</form>    
</body>
</html>