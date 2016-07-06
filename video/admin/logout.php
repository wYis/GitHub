<?php 
session_start();
unset($_SESSION['row']);
header("location:../index.php");
?>