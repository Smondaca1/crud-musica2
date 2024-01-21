<?php

function validateUrl($url) { 
    preg_match('#^(?:https?://)?(?:www\.)?(?:youtube\.com(?:/embed/|/v/|/watch\?v=))([\w-]{11})(?:.+)?$#x', $url, $r); 
    return (isset($r[1]) && !empty($r[1])) ? $r[1] : false; 
}

?>