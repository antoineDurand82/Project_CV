<?php
session_name();
session_start();
session_destroy();
header('Location: ../index.php');
exit;
?>