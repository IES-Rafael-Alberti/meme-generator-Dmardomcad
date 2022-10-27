<?php
if(isset($_POST['nombre'])) {
   require("conecta.php");

    // recupera los datos del formulario
    $nombre = $_POST["nombre"];
    $pwd = $_POST["pwd"];
   
    // prepara la sentencia SQL. Le doy un nombre a cada dato del formulario 
    $sql = "SELECT * FROM nombre WHERE nombre = :nombre AND pwd = :pwd";
    // asocia valores a esos nombres
    $datos = array("nombre" => $nombre,
                   "pwd" => $pwd
                  );
    // comprueba que la sentencia SQL preparada está bien 
    $stmt = $conn->prepare($sql);
    // ejecuta la sentencia usando los valores
    $stmt->execute($datos);
    if($stmt->rowCount() == 1) {
        session_start();
        $_SESSION["nombre"] = $nombre;
        session_write_close();
        header("Location: index.php");
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
    <title>Protectora de animales RAfaNO - Login</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <label for="nombre">nombre: </label>
    <input type="text" name="nombre" id="nombre">
    <label for="pwd">pwd: </label>
    <input type="pwd" name="pwd" id="pwd">
    <input type="submit" value="Login">
</form>    
</body>
</html>