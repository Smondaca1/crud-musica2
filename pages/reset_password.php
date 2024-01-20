<?php 
    include "../controller/change_password.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script> 
    <title>Recuperar contraseña</title>
</head>
<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-auto w-80" src="../assets/CRUD_logo.png" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Recupera tu contraseña</h2>
            <span class="block text-center text-2xl leading-9 tracking-tight text-gray-500 italic">o</span>
            <a href="login.php" class="block text-center text-2xl font-bold leading-9 tracking-tight text-indigo-600 underline underline-offset-8 hover:text-indigo-500 italic">Inicia sesión</a>
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="#" method="POST">
                <div>
                    <label for="user" class="block text-sm font-medium leading-6 text-gray-900">Usuario</label>
                    <div class="mt-2">
                        <input id="user" name="user" type="text" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="newPassword" class="block text-sm font-medium leading-6 text-gray-900">Nueva contraseña</label>
                    </div>
                    <div class="mt-2 relative">
                        <input id="newPassword" name="newPassword" type="password" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <i id="newPasswordEye" class="fa-solid fa-eye absolute top-2/4 right-4 -translate-y-1/2 text-indigo-600 cursor-pointer"></i>
                    </div>
                </div>

                
                <div>
                    <div class="flex items-center justify-between">
                        <label for="confirmPassword" class="block text-sm font-medium leading-6 text-gray-900">Confirmar contraseña</label>
                    </div>
                    <div class="mt-2 relative">
                        <input id="confirmPassword" name="confirmPassword" type="password" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <i id="confirmPasswordEye" class="fa-solid fa-eye absolute top-2/4 right-4 -translate-y-1/2 text-indigo-600 cursor-pointer"></i>
                    </div>
                </div>

                <div>
                    <input name="submitBtn" type="submit" value="Confirmar" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer">
                </div>
            </form>
        </div>
    </div>
    <script>
        
        const newPasswordEye = document.querySelector("#newPasswordEye");
        const confirmPasswordEye = document.querySelector("#confirmPasswordEye");
        const inputNewPassword = document.querySelector("#newPassword");
        const inputConfirmPassword = document.querySelector("#confirmPassword");


        function showHidePassword(eye, password) {
            
            eye.addEventListener("click", ()=> {

                if(password.type == "password") {
                    password.type = "text";
                    eye.classList.replace("fa-eye", "fa-eye-slash");
                } else {
                    password.type = "password";
                    eye.classList.replace("fa-eye-slash", "fa-eye");
                };
            });
        };

        showHidePassword(newPasswordEye, inputNewPassword);
        showHidePassword(confirmPasswordEye, inputConfirmPassword)
 
    </script>
</body>
</html>