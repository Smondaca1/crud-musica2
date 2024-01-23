<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <script src="../assets/js/tailwind.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />

    <title>Playlist Home</title>
</head>
<body>
<div class="text-gray-300 min-h-screen p-10 pt-0">

<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <a href="" class="flex items-center">
                <img src="../assets/CRUD_logo.png" class="w-36" alt="Crud logo" />
            </a>
            <div class="flex items-center lg:order-2">
                <a href="../controllers/logout.php" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Cerrar sesión</a>
            </div>
            <div class="justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="index.php" class="block py-2 pr-4 pl-3 text-black rounded bg-primary-700 lg:bg-transparent  lg:p-0 dark:text-white" aria-current="page">Biblioteca</a>
                    </li>
                    <li>
                        <a href="playlist.php" class="block py-2 pr-4 pl-3 lg:text-primary-700 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Playlist</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="flex justify-center mt-5 mb-16">
    <button type="button" id="defaultModalButton" data-modal-target="createPlaylistModal" data-modal-toggle="createPlaylistModal" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        Agregar nueva playlist
        <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
    </button>
</div>
<div class='grid grid-cols-5 gap-4 '>

    <a href="#" class="overflow-hidden rounded-xl relative group">
        <div class="rounded-xl z-50 opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out cursor-pointer absolute from-black/100 to-transparent bg-gradient-to-t inset-0 bottom-0 pt-30 text-white flex items-end">
                <div class="p-4 text-xl group-hover:opacity-100 group-hover:translate-y-0 translate-y-2 pb-6 transform transition duration-300 ease-in-out">
                    <span class="font-bold">De chill</span>
                </div>
        </div>
        <img alt="" class="object-cover w-full aspect-square group-hover:scale-110 transition duration-300 ease-in-out" src="../assets/images/233.jpg"/>
    </a>
    
 </div>

</div>

<?php include "../modals/createPlaylistModal.php";?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</html>