<?php

session_start();
include "../functions/alerts/message.php";
require "../database/db.php";

if (!empty($_POST["submitBtn"])) {

    if (empty($_POST["user"]) || empty($_POST["newPassword"]) || empty($_POST["confirmPassword"])) {
        errorMessage("Por favor completar todos los campos solicitados.");
    } else {
        $user = $_POST["user"];
        $newPassword = $_POST["newPassword"];
        $confirmPassword = $_POST["confirmPassword"];

        if ($newPassword !== $confirmPassword) {
            errorMessage("Las contraseñas no coinciden.");
            return;
        }

        $stmt = $conn->prepare("SELECT * FROM usuario WHERE user = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($datos = $result->fetch_object()) {

            $stmtUpdate = $conn->prepare("UPDATE usuario SET password = ? WHERE user = ?");
            $stmtUpdate->bind_param("ss", $newPassword, $user);
            $stmtUpdate->execute();
            $stmtUpdate->close();

            successMessage("Contraseña cambiada con éxito.");
        } else {
            errorMessage("El usuario '$user' no existe en nuestra base de datos.");
        }
    }
}

?>