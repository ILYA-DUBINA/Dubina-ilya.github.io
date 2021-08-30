<?php
   // require "../dispatch.php";
   require "../connect.php";
?>

<!DOCTYPE html>
<html lang="ru">
   <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../../css/style.min.css">
   <title>My_site_admin_panel</title>
</head>   
<body>  

   <div class="cocoon">
      <div class="container">   

         <section class="page myworks">    
            <div class="myworks__content-form">
               <form class="form__form" action="password_admin.php" method="POST">
                  <fieldset class="form__fieldset">
                     <legend class="form__legend"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Вход в админ панель: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </legend>                        
                     <input class="form__input" type="text" name="login" placeholder="Ваш логин*"/>
                     <input class="form__input" type="password" name="password" placeholder="Ваш пароль*"/>
                     <input class="form__input" type="password" name="passwordTwo" placeholder="Пожалуйста повторите пароль*"/>                        
                     <button class="form__button" type="submit">Войти</button>
                  </fieldset>
               </form>
            </div>
          </section><!?--/section_one-->

      </div> 
   </div>  

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="../../js/script.min.js"></script>   
</body>
</html>