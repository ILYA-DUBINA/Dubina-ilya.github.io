<?php

require "connect.php";

$comments_id = (int) $_GET['id'];
$idUpdate = mysqli_query($connection, "SELECT * FROM `comments` WHERE `id` = $comments_id");
$treatment = mysqli_fetch_assoc($idUpdate);