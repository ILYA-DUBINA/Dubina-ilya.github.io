<?php

require "connect.php";

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
      $phone= test_input($_POST["phone"]);
      $email = test_input($_POST["email"]);
      $message = test_input($_POST['message']);  
      $date = date("Y-m-d H:i:s");     

      if(strlen($name) > 2 && strlen($email) > 2 && strlen($message) > 2){
         
         if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            
            if (!preg_match("/[^0-9a-zA-Zа-яёА-ЯЁ _?!.,]/u",$name) && !preg_match("/[^0-9a-zA-Zа-яёА-ЯЁ _?!.,]/u",$message) && !preg_match("/[^+?0-9 _-]$/", $phone))  {

               if (mail("dinlion@yandex.ru",
                        "Новое письмо с моего сайта",
                        "Имя: ". $name. "\n" .
                        "Телефон: ". $phone. "\n" .                  
                        "Email: ". $email. "\n" .
                        "Сообщение: ". $message. "\n" .                  
                        "Дата и время: ". $date,
                        "From: Дубина Илья \r\n".     
                        "Reply-To: dinlion@yandex.ru \r\n".     
                        "From: PHP/" . phpversion() 
                        )
                  ) 
               {
                  echo ('Письмо успешно отправлено!');
               } else {
                  echo ('Ошибка при отправке письма Ошибка при отправке!');
               }

            } else {            
               header('Location: ../Contacts.php');
               exit();
            }

         } else {            
            header('Location: ../Contacts.php');
            exit();
         }

      } else {
         header('Location: ../Contacts.php');
         exit();
      }

   } else {      
      header('Location: ../Contacts.php');
      exit();
   }

} else {      
   header('Location: ../Contacts.php');
   exit();
}
