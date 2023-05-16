<?php
session_start();
unset($_SESSION["userI"]);
header('location:index.php');
?>