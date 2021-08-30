<?php

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = addslashes($data);
   $data = htmlspecialchars($data);

   return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
          
      $name = test_input($_POST["name"]);
      $surname= test_input($_POST["surname"]);
      $email = test_input($_POST["email"]);
      $message = test_input($_POST['message']);  
      $date = date("Y-m-d H:i:s");  
      $parent_id = (int) $_POST['parent_id'];
      $idUser = $_POST['idUser'];  

      if(strlen($name) > 2 && strlen($email) > 2 && strlen($message) > 2){
         
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            if (!preg_match("/[^0-9a-zA-Zа-яёА-ЯЁ _?!.,]/u",$name) && !preg_match("/[^0-9a-zA-Zа-яёА-ЯЁ _?!.,]/u",$surname) && !preg_match("/[^0-9a-zA-Zа-яёА-ЯЁ _?!.,]/u",$message) ) {
         
               $db = new PDO('mysql:host=localhost;dbname=ce84354_mysite', 'ce84354_mysite', '12345678Ilya');
               $db->exec("SET NAMES UTF8");
               $query = $db->prepare("INSERT INTO comments(name, surname, email, message, date, parent_id, idUser) VALUES(:name, :surname, :email, :message, :date, :parent_id, :idUser)");
               $values = ['name' => $name, 'surname' => $surname, 'email' => $email, 'message' => $message, 'date' => $date, 'parent_id' => $parent_id, 'idUser' => $idUser];
               $query->execute($values);         

               $msg = 'Заявка принята!';

               header('Location: ../My_works.php');
               exit();

            } else {            
               header('Location: ../My_works.php');
               exit();
            }

         } else {            
            header('Location: ../My_works.php');
            exit();
         }

      } else {
         header('Location: ../My_works.php');
         exit();
      }

   } else {
      header('Location: ../My_works.php');
      exit();
   }
   
} else {      
   header('Location: ../My_works.php');
   exit();
}

