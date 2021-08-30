<?php

require "connect.php";

$id = addslashes(htmlspecialchars(trim($_POST['id'])));
$name = addslashes(htmlspecialchars(trim($_POST['name'])));
$surname = addslashes(htmlspecialchars(trim($_POST['surname'])));
$email = addslashes(htmlspecialchars(trim($_POST['email'])));
$message = addslashes(htmlspecialchars(trim($_POST['message'])));    

mysqli_query($connection, "UPDATE `comments` SET `name` = '$name', `surname` = '$surname', `email` = '$email', `message` = '$message' WHERE `comments`.`id` = $id");

header('Location: ../My_works.php');