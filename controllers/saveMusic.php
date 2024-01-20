<?php
session_start();
require "../database/db.php";

function validarFormatoImagen($tipo) {
    $formatosPermitidos = array("image/jpeg", "image/jpg");
    return in_array($tipo, $formatosPermitidos);
}

if ($_FILES['imageFile']['error'] == UPLOAD_ERR_OK) {
    $tipoImagen = $_FILES['imageFile']['type'];

    if (!validarFormatoImagen($tipoImagen)) {
        $_SESSION['msg'] = "Formato de imagen no permitido";
        $_SESSION['color'] = "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400";
        header('Location: ../pages/index.php');
        exit;
    }
} else {
    $_SESSION['msg'] = "Error al cargar la imagen: " . $_FILES['imageFile']['error'];
    $_SESSION['color'] = "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400";
    header('Location: ../pages/index.php');
    exit;
}

$title = $conn->real_escape_string($_POST['title']);
$author = $conn->real_escape_string($_POST['author']);
$url = $conn->real_escape_string($_POST['url']);
$genre = $conn->real_escape_string($_POST['genre']);

$sql = "INSERT INTO cancion (title, author, url, id_genre, created_at) VALUES ('$title', '$author', '$url', $genre, NOW())";

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
            $_SESSION['msg'] .= "<br>Error al guardar la imagen";
        }
    }
} else {
    $_SESSION['msg'] .= "<br>Error al insertar datos en la base de datos: " . $conn->error;
}

header('Location: ../pages/index.php');
exit;
?>
