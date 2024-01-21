<?php


require '../database/db.php';

$id = $conn->real_escape_string($_POST["id"]);

$sql = "SELECT id,title,author,id_genre,url FROM cancion WHERE id=$id LIMIT 1";
$result = $conn->query($sql);
$rows = $result->num_rows;

$song = [];

if($rows > 0) {
    $song = $result->fetch_array();
}

echo json_encode($song, JSON_UNESCAPED_UNICODE);
?>