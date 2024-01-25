<?php
session_start();
require "../database/db.php";
include "../functions/validations/validateFile.php";


if ($_FILES['imageFile']['error'] == UPLOAD_ERR_OK) {
    $tipoImagen = $_FILES['imageFile']['type'];

    if (!validateFile($tipoImagen)) {
        $_SESSION['msg'] = "Formato de imagen no permitido";
        $_SESSION['color'] = "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400";
        header('Location: ../pages/playlistHome.php');
        exit;
    }

} else {
    $_SESSION['msg'] = "Error al cargar la imagen: " . $_FILES['imageFile']['error'];
    $_SESSION['color'] = "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400";
    header('Location: ../pages/playlistHome.php');
    exit;
}


$title = $conn->real_escape_string($_POST['title']);
$description = $conn->real_escape_string($_POST['description']);

$sql = "INSERT INTO playlists (title, description, created_at) VALUES ('$title', '$description', NOW())";

if ($conn->query($sql)) {
    $id = $conn->insert_id;
    
    $_SESSION['color'] = "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400";
    $_SESSION['msg'] = "Registro guardado";

    $dir = "../assets/images";
    $images = $dir . '/' . $id . '.jpg';

    if (!file_exists($dir)) {
        mkdir($dir, 0777, true);
    }

    if ($_FILES['imageFile']['error'] == UPLOAD_ERR_OK) {
        if (!move_uploaded_file($_FILES['imageFile']['tmp_name'], $images)) {
            $_SESSION['color'] = "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400";
            $_SESSION['msg'] .= "Error al guardar la imagen";
        }
    }
} else {
    $_SESSION['msg'] .= "Error al insertar datos en la base de datos: " . $conn->error;
}


header("Location: ../pages/playlistHome.php");
exit()

?>