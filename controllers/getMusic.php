<?php


require '../database/db.php';

$id = $conn->real_escape_string($_POST["id"]);

$sql = "SELECT id,title,author,id_genre,url FROM cancion WHERE id=$id LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$cancion = [];

if($rows > 0) {
    $cancion = $resultado->fetch_array();
}

echo json_encode($cancion, JSON_UNESCAPED_UNICODE);
?>