<?php
session_start();
require "../database/db.php";

if(!empty($_POST["submitBtn"])) {

    if(empty($_POST["user"]) || empty($_POST["password"])) {
        echo '
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    ¡ Ha ocurrido un error !
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p>Por favor completar todos los campos solicitados.</p>
                </div>
            </div> ';
    } else {
        $user = $_POST["user"];
        $password = $_POST["password"];
        $consult = $conn->query("SELECT * FROM usuario WHERE user='$user' and password ='$password'");

        if($datos = $consult->fetch_object()) {
            $_SESSION["id"] = $datos->id;
            $_SESSION["user"] = $datos->user;
            $_SESSION["password"] = $datos->password;

            if($_SESSION["password"] != $password) {
                echo '
                    <div role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            ¡ Ha ocurrido un error !
                        </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>La contraseña que ha ingresado es incorrecta.</p>
                    </div>
                </div> ';
                return;
            }

            header("Location: ../pages/index.php");
        } else {
            echo "
                <div role='alert'>
                    <div class='bg-red-500 text-white font-bold rounded-t px-4 py-2'>
                        ¡ Ha ocurrido un error !
                    </div>
                <div class='border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700'>
                    <p>El usuario '$user' no existe en nuestra base de datos.</p>
                </div>";
        } 
    }
}

?>