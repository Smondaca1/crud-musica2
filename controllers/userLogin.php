<?php
session_start();
require "../database/db.php";
include "../functions/alerts/message.php";

if (!empty($_POST["submitBtn"])) {

    if (empty($_POST["user"]) || empty($_POST["password"])) {
        errorMessage("Por favor completar todos los campos solicitados.");
    } else {
        $user = $_POST["user"];
        $password = $_POST["password"];

        $stmt = $conn->prepare("SELECT * FROM usuario WHERE user = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($data = $result->fetch_object()) {

            if ($data->password == $password) {
                $_SESSION["id"] = $data->id;
                $_SESSION["user"] = $data->user;
                $_SESSION["password"] = $data->password;

                header("Location: ../pages/index.php");
                exit();
            } else {
                errorMessage("La contraseña que ha ingresado es incorrecta.");
            }

        } else {
            errorMessage("El usuario '$user' no existe en nuestra base de datos.");
        }
    }
}
?>
