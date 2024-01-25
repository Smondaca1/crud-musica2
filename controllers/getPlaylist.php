<?php

require '../database/db.php';

$id = $conn->real_escape_string($_POST["id"]);

$sql = "SELECT id,title,description FROM playlists WHERE id=$id LIMIT 1";
$result = $conn->query($sql);
$rows = $result->num_rows;

$playlist = [];

if($rows > 0) {
    $playlist = $result->fetch_array();
}

echo json_encode($playlist, JSON_UNESCAPED_UNICODE);
?>