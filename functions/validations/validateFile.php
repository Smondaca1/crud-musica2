<?php

function validateFile($type) {
    $format = array("image/jpeg", "image/jpg");
    return in_array($type, $format);
}

?>