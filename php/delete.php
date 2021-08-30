<?php

require "connect.php";

$id = (int) $_GET['id'];
mysqli_query($connection, "DELETE FROM `comments` WHERE `comments`.`id` = $id");
mysqli_query($connection, "DELETE FROM `comments` WHERE `comments`.`parent_id` = $id");

header('Location: ../My_works.php');