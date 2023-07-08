<?php
session_start();
session_unset();
session_destroy();
header('Location: ../../view/accueil2.php');
exit();
?>