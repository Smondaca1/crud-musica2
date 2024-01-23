<?php 
session_start();
require "../database/db.php";

$sqlSongs = "SELECT m.id, m.title, m.author, m.url, m.created_at, m.image_file, g.genre AS genero FROM cancion AS m INNER JOIN genero AS g ON m.id_genre=g.id";
$songs = $conn->query($sqlSongs);
$dir = "../assets/images/";

if(empty($_SESSION["user"])) {
    header("Location: ../pages/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../assets/js/tailwind.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
    <title>CRUD</title>
</head>
<body>
    <?php if(isset($_SESSION['msg']) && isset($_SESSION['color'])) {?>
        <div class='<?php echo $_SESSION['color']; ?>' role="alert">
            <span class="font-medium text-base"> <?php echo $_SESSION['msg']; ?></span>
        </div>
        
        <?php
        unset($_SESSION['msg']);
        unset($_SESSION['color']);
        }?>
            
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
                        <a href="index.php" class="block py-2 pr-4 pl-3 text-white rounded bg-primary-700 lg:bg-transparent lg:text-primary-700 lg:p-0 dark:text-white" aria-current="page">Biblioteca</a>
                    </li>
                    <li>
                        <a href="playlistHome.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Playlist</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="flex justify-center m-5">
    <button type="button" id="defaultModalButton" data-modal-target="createModal" data-modal-toggle="createModal" class="text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
        Agregar nueva canción
        <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
    </button>
</div>
<div class="overflow-x-auto">
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
            <?php while($row_song = $songs->fetch_assoc()) { ?>
                <tr class="border-b dark:border-gray-700">
                    <td class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $row_song["id"]; ?></td>
                    <td class="px-4 py-4"><?php echo $row_song["title"]; ?></td>
                    <td class="px-4 py-4"><?php echo $row_song["author"]; ?></td>
                    <td class="px-4 py-4"><?php echo $row_song["genero"]; ?></td>
                    <td class="px-4 py-4"><?php echo $row_song["url"]; ?></td>
                    <td class="w-32 px-4 py-4"><img class="w-full object-cover" src="<?php echo $dir. $row_song["id"] . '.jpg?n=' .time(); ?>" ></td>
                    <td class="flex items-center space-x-4 px-4 py-4">
                        <button data-bs-id="<?php echo $row_song["id"]; ?>" type="button" class="inline-flex h-9 items-center justify-center gap-2 whitespace-nowrap rounded bg-emerald-500 px-6 text-sm font-medium tracking-wide text-white transition duration-300 hover:bg-emerald-600 focus:bg-emerald-700 focus-visible:outline-none disabled:cursor-not-allowed disabled:border-emerald-300 disabled:bg-emerald-300 disabled:shadow-none">
                            <svg class="h-4 w-4 mr-2 -ml-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M19 3a2 2 0 0 1 2 2v2h-2V5.4L17.4 7h-2.8l2-2h-2.2l-2 2H9.6l2-2H9.4l-2 2H3V5c0-1.1.9-2 2-2h14ZM3 9v10c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2V9H3Zm2-2.4L6.6 5H5v1.6ZM9.6 11a1 1 0 0 1 1 .1l4 3a1 1 0 0 1 0 1.6l-4 3A1 1 0 0 1 9 18v-6c0-.4.2-.7.6-.9Z" clip-rule="evenodd"/>
                            </svg>
                            Agregar a la Playlist
                        </button>
                        <button data-bs-id="<?php echo $row_song["id"]; ?>" type="button" data-modal-target="editModal" data-modal-toggle="editModal" aria-controls="editModal" class="editBtn py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                            </svg>
                            Editar
                        </button>
                        <button  data-bs-id="<?php echo $row_song["id"]; ?>" type="button" data-modal-target="deleteModal" data-modal-toggle="deleteModal"  class=" deleteBtn flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                                Eliminar
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php
    $sqlGenre = "SELECT id,genre FROM genero";
    $genres = $conn->query($sqlGenre);
?>

<?php include "../modals/createModal.php";?>

<?php $genres->data_seek(0);?>
<?php include "../modals/editModal.php";?>
<?php include "../modals/deleteModal.php";?>



<script>
    let editModal = document.getElementById("editModal")
    let editBtn = document.querySelectorAll(".editBtn")

    editBtn.forEach(btn => {
        btn.addEventListener("click", event => {
            
                let button = event.target
                let id = button.getAttribute('data-bs-id')
                
                let inputId = editModal.querySelector("#id")
                let inputTitle = editModal.querySelector("#title")
                let inputAuthor = editModal.querySelector("#author")
                let inputGenre = editModal.querySelector("#genre")
                let inputUrl = editModal.querySelector("#url")
                console.log(id)
                
                let url = "../controllers/getMusic.php";
                let formData = new FormData()
                formData.append("id", id)
                
            fetch(url, {
                    method: "POST",
                    body: formData
            }).then(response => response.json())
                .then(data => {
                    inputId.value = data.id
                    inputTitle.value = data.title
                    inputAuthor.value = data.author
                    inputGenre.value = data.id_genre
                    inputUrl.value = data.url
    
            }).catch(err => console.log(err))
        })
    })

    let deleteModal = document.getElementById("deleteModal")
    let deleteBtn = document.querySelectorAll(".deleteBtn")

    deleteBtn.forEach(btn => {
        btn.addEventListener("click", event => {
            let button = event.target
            let id = button.getAttribute('data-bs-id')
            deleteModal.querySelector("#id").value = id
        })
    })



</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<!--
<script>

    document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('defaultModalButton').click();
});

</script>
-->

</body>
</html>