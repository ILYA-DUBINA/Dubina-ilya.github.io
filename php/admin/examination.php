<?php

session_start();

$login = "PULSAR";
$password = "Arhangel";
$passwordTwo = "Arhangel";

if($_SESSION["login"] === $login && $_SESSION["password"] === $password && $_SESSION["passwordTwo"] === $passwordTwo){
   header('Location: my_works_admin.php');
}