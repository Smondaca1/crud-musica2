<?php
session_start();
require "../database/db.php";

function validarFormatoImagen($tipo) {
    $formatosPermitidos = array("image/jpeg", "image/jpg");
    return in_array($tipo, $formatosPermitidos);
}


if (isset($_POST['id'])) {
    $id = $conn->real_escape_string($_POST['id']);

    if ($_FILES['imageFile']['error'] == UPLOAD_ERR_OK) {
        $tipoImagen = $_FILES['imageFile']['type'];

        if (!validarFormatoImagen($tipoImagen)) {
            $_SESSION['msg'] = "Formato de imagen no permitido";
            $_SESSION['color'] = "p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400";
            header('Location: ../pages/index.php');
            exit;
        }
    }

    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $url = $conn->real_escape_string($_POST['url']);
    $genre = $conn->real_escape_string($_POST['genre']);

    $sql = "UPDATE cancion SET title = '$title', author = '$author', url = '$url', id_genre = $genre WHERE id = $id";

    // Ejecutar la consulta
    if ($conn->query($sql)) {
        $_SESSION['color'] = "p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400";
        $_SESSION['msg'] = "Registro actualizado";

        if ($_FILES['imageFile']['error'] == UPLOAD_ERR_OK) {
            $dir = "../assets/images";
            $images = $dir . '/' . $id . '.jpg';

            if (!file_exists($dir)) {
                mkdir($dir, 0777, true);
            }

            if (!move_uploaded_file($_FILES['imageFile']['tmp_name'], $images)) {
                $_SESSION['msg'] .= "<br>Error al guardar la nueva imagen";
            }
        }
    } else {
        $_SESSION['msg'] .= "<br>Error al actualizar datos en la base de datos: " . $conn->error;
    }
} else {
    $_SESSION['msg'] .= "<br>Error: No se proporcionó el identificador para la actualización";
}

header('Location: ../pages/index.php');
exit;
?>