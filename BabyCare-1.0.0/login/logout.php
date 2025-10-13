<?php
session_start();
session_destroy();
header('Location: ../deslogado/login.php');
?>