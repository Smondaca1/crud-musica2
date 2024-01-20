<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "crud_musica"
);

if($conn->connect_error) {
    die("Error al conectar con la base de datos" . $conn->connect_error);
}