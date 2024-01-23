<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script> 
    <script src="../assets/js/tailwind.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <title>Playlist</title>
</head>
<body>

<div class="text-gray-300 min-h-screen p-10 pt-0">

<header class="mb-16">
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
  
  <div class="flex">
    <img class="mr-6" src="https://placekitten.com/g/200/200">
    <div class="flex flex-col justify-center">
        <h1 class="mt-0 mb-2 text-black text-4xl font-bold">Nombre de la playlist</h1>
      <h4 class="mt-0 mb-2 text-black max-w-xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta cupiditate consectetur explicabo vel fuga reiciendis dolor, consequuntur officiis ratione nihil, expedita, minus beatae. Architecto ab sunt cumque obcaecati dolor possimus.</h4>
      <p class="text-gray-600 mb-2 text-sm">Lost on you, The final countdown, etc...</p>
      <p class="text-gray-600 text-sm">Creado por <a class="font-bold">usuario</a></p>
    </div>
  </div>
  

  <div class="mt-6 flex justify-between">
    <div class="flex">
        <button data-modal-target="editPlaylistModal" data-modal-toggle="editPlaylistModal" aria-controls="editPlaylistModal" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Editar Playlist</button>
        <button data-modal-target="deletePlaylistModal" data-modal-toggle="deletePlaylistModal" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar Playlist</button>
    </div>
  </div>

<div class="overflow-x-auto mt-10">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
            <tr>
                <th scope="col" class="px-4 py-4">ID</th>
                <th scope="col" class="px-4 py-4">Título</th>
                <th scope="col" class="px-4 py-4">Autor</th>
                <th scope="col" class="px-4 py-4">Género</th>
                <th scope="col" class="px-4 py-4">URL</th>
                <th scope="col" class="px-4 py-4">Imagen</th>
                <th scope="col" class="px-4 py-4">Acciones</th>
            </tr>
        </thead>
        <tbody >
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">1</td>
                    <td class="px-4 py-4">The final countdown</td>
                    <td class="px-4 py-4">Europe</td>
                    <td class="px-4 py-4">Rock</td>
                    <td class="px-4 py-4">https://www.youtube.com/watch?v=9jK-NcRmVcw/td>
                    <td class="w-32 px-4 py-4"><img class="w-full object-cover" src="../assets/images/233.jpg" ></td>
                    <td class="flex items-center space-x-4 px-4 py-4">
                        <button  type="button" data-modal-target="deleteSongPlaylistModal" data-modal-toggle="deleteSongPlaylistModal"  class=" deleteBtn flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                                Eliminar
                        </button>
                    </td>
                </tr>

        </tbody>
    </table>
</div>
</div>
    <?php include "../modals/editPlaylistModal.php";?>
    <?php include "../modals/deletePlaylistModal.php";?>
    <?php include "../modals/deleteSongPlaylistModal.php";?>



<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</html>