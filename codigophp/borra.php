<?php
require ("conexion.php");

$meme = $_GET['id'];

$sql = "DELETE FROM meme WHERE id = :idmeme";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":idmeme", $meme);
if($stmt->execute() != 1) {
    print("No se pudo dar de baja");
    exit(0);
}

header("Location: index.php");