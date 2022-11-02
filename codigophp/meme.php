<?php session_start();
require("conecta.php");

$id = $_POST["id"];
$cajas = $_POST["cajas"];
$arrayCajas = array();

for ($i = 1; $i <= $cajas; $i++){
    array_push($arrayCajas, array("text" => $_POST["cajas$i"]));

}

$fields = array (
    "template_id" => $id,
    "username" => "fjortegan",
    "password" => "pestillo",
    "boxes" => $arrayCajas
);

//url for meme creation
$url = 'https://api.imgflip.com/caption_image';

//url-ify the data for the POST
$fields_string = http_build_query($fields);


//open connection
$ch = curl_init();

//set the url,number of POST vars, POST data.
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//receive url content 
$result = curl_exec($ch);

//decode content (assoc array)
$data = json_decode($result, true);

//if success shows images
if($data["success"]) {
    //iterates over memes array
    $nombreMeme=date("dmyHis").".jpg";
    file_put_contents("memes/$nombreMeme",file_get_contents($data["data"]["url"]));
    $sql = "INSERT INTO memes (nombrememe,ruta,id_usuario) values (:nombre,:ruta,:id_usuario)";
    $datos = array(
        "nombre" => $nombreMeme,
        "ruta" => "memes/$nombreMeme",
        "id_usuario" => $_SESSION["id"]
    );

    $stmt = $conn->prepare($sql);

    if($stmt->execute($datos)!=1){
        echo ("No se puede añadir el meme a la database");
        exit(0);
    }
}