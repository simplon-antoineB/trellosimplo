<?php

session_start();
$_SESSION = array();
session_destroy();
header_remove();

header('Location: simplo.php');
die();

?>
