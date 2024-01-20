<?php 
    session_start();
    require "../database/db.php";
    
    if(!empty($_POST["submitBtn"])) {

        if(empty($_POST["user"]) || empty($_POST["newPassword"]) || empty($_POST["confirmPassword"])) {
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
            $newPassword = $_POST["newPassword"];
            $confirmPassword = $_POST["confirmPassword"];
            $consult = $conn->query("SELECT * FROM usuario WHERE user='$user'");

            if($datos = $consult->fetch_object()) {
                $_SESSION["id"] = $datos->id;
                $_SESSION["user"] = $datos->user;
                $_SESSION["password"] = $datos->password;

                if($_SESSION["user"] != $user) {
                    echo "
                    <div role='alert'>
                        <div class='bg-red-500 text-white font-bold rounded-t px-4 py-2'>
                            ¡ Ha ocurrido un error !
                        </div>
                        <div class='border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700'>
                            <p>El usuario '$user' no exite en nuestra base de datos.</p>
                        </div>
                    </div> ";
                    return;
                } else if ($newPassword != $confirmPassword) {
                    echo "
                    <div role='alert'>
                        <div class='bg-red-500 text-white font-bold rounded-t px-4 py-2'>
                            ¡ Ha ocurrido un error !
                        </div>
                        <div class='border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700'>
                            <p>Las contraseñas no coinciden.</p>
                        </div>
                    </div> ";
                    return;
                } else {
                    $sql = $conn->query("UPDATE usuario SET password = '$newPassword'");                 
                        echo "
                        <div class='bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md' role='alert'>
                            <div class='flex'>
                                <div>
                                    <p class='font-bold'>La contraseña ha sido cambiada con éxito.</p>
                                    <p class='italic'>Redirigiendo... Tiempo aproximado: 5seg.</p>
                                </div>
                            </div>
                        </div> ";
                        
                        $time = 5;
                        $url = '../pages/login.php';
                        header("refresh: $time; url=$url");      
                }
            } else {
                echo "
                <div role='alert'>
                    <div class='bg-red-500 text-white font-bold rounded-t px-4 py-2'>
                        ¡ Ha ocurrido un error !
                    </div>
                    <div class='border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700'>
                        <p>El usuario '$user' no exite en nuestra base de datos.</p>
                    </div>
                </div> ";
                return;
            }
        } 
    
    } 
?>
