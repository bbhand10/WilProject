<?php
include('connection.php');
session_start();
if (isset($_POST['logout'])) {
    unset($_SESSION["user"]);
    header('location:login');
}
if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
    header('location:login.php');
}
?>