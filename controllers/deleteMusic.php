<?php

require "../database/db.php";

$id = $conn->real_escape_string($_POST["id"]);

$sql = "DELETE FROM cancion WHERE id=$id ";
if($conn->query($sql)) {
    
}

header("Location:../pages/index.php");