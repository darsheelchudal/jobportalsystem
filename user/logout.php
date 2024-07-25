<?php
session_start();
session_unset();
session_destroy();


if(!isset($_SESSION['logged_in'])){
    header("login.php");
}

header('location:../index.php');
