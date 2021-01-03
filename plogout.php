<?php
session_start();
unset($_SESSION['emel_plgn']);
session_destroy();

header("Location: putamapengguna.php");
exit;
?>