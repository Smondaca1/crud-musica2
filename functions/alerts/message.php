<?php

function errorMessage($message) {
    echo '
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                ¡ Ha ocurrido un error !
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>' . $message . '</p>
            </div>
        </div>';
}

function successMessage($message) {
    echo '
        <div role="alert">
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                Éxito
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                <p>' . $message . '</p>
            </div>
        </div>';
}

?>