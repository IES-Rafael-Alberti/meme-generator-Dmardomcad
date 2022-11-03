<?php
require ("conecta.php");

$meme = $_GET['id'];

$sql = "DELETE FROM memes WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":id", $meme);
if($stmt->execute() != 1) {
    print("No se pudo eliminar!");
    exit(0);
}

header("Location: index.php");