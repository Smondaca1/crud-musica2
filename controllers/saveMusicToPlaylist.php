<?php
session_start();
require "../database/db.php";

// Obtener los valores del formulario
$idSong = $_POST['id'];
$idPlaylist = $_POST['playlist_id'];

if (isset($_POST['submit'])) {

        $sql = "INSERT INTO playlist_cancion (id_playlists, id_song) VALUES (?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $idPlaylist, $idSong);

        if ($stmt->execute()) {
            $_SESSION['color'] = "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400";
            $_SESSION['msg'] = "Registro actualizado: La canción se ha agregado a la playlist";
        }

        $stmt->close();
} 
header("Location: ../pages/index.php");
$conn->close();
?>
