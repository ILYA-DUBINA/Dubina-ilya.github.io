<?php

$login = "PULSAR";
$password = "Arhangel";
$passwordTwo = "Arhangel";

if($login === htmlspecialchars(urldecode(trim($_POST['login']))) && $password === htmlspecialchars(urldecode(trim($_POST['password']))) && $passwordTwo === htmlspecialchars(urldecode(trim($_POST['passwordTwo'])))){

   session_start();

   $_SESSION["login"] = $_POST['login'];
   $_SESSION["password"] = $_POST['password'];
   $_SESSION["passwordTwo"] = $_POST['passwordTwo'];

   header('Location: examination.php');   
} else {
   header('Location: entrance_admin.php');
}