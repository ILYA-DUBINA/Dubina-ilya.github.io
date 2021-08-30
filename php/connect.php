<?php

   $config = array(
      'title' => 'Мой сайт',
      'db' => array(
            'server'=>'localhost',
            'username'=>'ce84354_mysite',
            'password'=>'12345678Ilya',
            'name'=>'ce84354_mysite'
      )
   );

   $connection = mysqli_connect(
      $config['db']['server'],
      $config['db']['username'],
      $config['db']['password'],
      $config['db']['name']
   );

   if($connection == false){
      echo 'Не удалось подключиться к базе данных!<br>';
      echo mysqli_connect_error();
      exit();
   }