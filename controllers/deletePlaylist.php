<?php
session_start();
require "../database/db.php";

$id = $conn->real_escape_string($_POST["id"]);

$sql = "DELETE FROM playlists WHERE id=$id ";

if($conn->query($sql)) {
    $dir = "../assets/images";
    $images = $dir . '/' . $id . '.jpg';

    if(file_exists($images)) {
        unlink($images);
    }

    $_SESSION['color'] = "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400";
    $_SESSION['msg'] = "Registro actualizado: La playlist ha sido eliminado con éxito";
}

header("Location:../pages/playlistHome.php");