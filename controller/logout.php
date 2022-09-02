<?php

// Remove cookie variables
if(isset($_COOKIE['email'])):
setcookie('email', '', time()-(86400 * 7), '/');
setcookie('id', '', time()-(86400 * 7), '/');
endif;

header("Location: ../index.php");

?>