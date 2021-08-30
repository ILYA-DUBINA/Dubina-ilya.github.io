<?php

require "updateDb.php";

?>

<!DOCTYPE html>
<html lang="ru">
   <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/style.min.css">
   <title>My_site</title>
</head>   
<body>  

   <div class="cocoon">
      <div class="container">    

         <header class="header">
            <div class="header__content header__content-myworks">
               <div class="header__content-image header__content-image-myworks">
                  <picture><source srcset="../images/home/знак.webp" type="image/webp"><img class="header__image-img" src="../images/home/знак.jpg" alt="иконка моего сайта"></picture>
               </div>
               <div class="header__burger">
                  <span></span>
               </div>
               <nav class="header__content-nav header__content-nav-myworks">
                  <ul class="header__nav-ul">
                     <li class="header__nav-li">
                        <a href="../index.php" style="background: url('../images/home/Shape12.png') 0 0/100% 100% no-repeat;">Главная</a>
                     </li>
                     <li class="header__nav-li">
                        <a href="../About_me.php" style="background: url('../images/home/Shape12.png') 0 0/100% 100% no-repeat;">Обо мне</a>
                     </li>
                     <li class="header__nav-li">
                        <a href="../Contacts.php" style="background: url('../images/home/Shape12.png') 0 0/100% 100% no-repeat;">Контактная информация</a>
                     </li>
                  </ul>
               </nav>
            </div>
         </header>

         <section class="page myworks">    
            <div class="myworks__content">
               <div class="myworks__content-sits">
                  <div class="sits__image border-right">
                     <a href="http://first-restaurant.space/#sidebar"><picture><source srcset="../images/my_works/1-1).webp" type="image/webp"><img class="sits__image-img" src="../images/my_works/1-1).png" alt="картинка сайта моей верстки"></picture></a>
                  </div>
                  <div class="sits__image border-left">
                     <a href="http://dinlion-project-concept.space/"><picture><source srcset="../images/my_works/2-1).webp" type="image/webp"><img class="sits__image-img" src="../images/my_works/2-1).png" alt="картинка сайта моей верстки"></picture></a>
                  </div>
                  <div class="sits__image border-bottom">
                     <a href="http://shophia.space/"><picture><source srcset="../images/my_works/3-1).webp" type="image/webp"><img class="sits__image-img" src="../images/my_works/3-1).png" alt="картинка сайта моей верстки"></picture></a>
                  </div>
               </div>
               <div class="myworks__content-pedicle">
               </div>
               <div class="myworks__content-comments">               

               <div class="myworks__content-form">
                  <form class="form__form" action="updateTreatment.php" method="POST">
                     <fieldset class="form__fieldset">
                        <legend class="form__legend">Исправьте или дополните все то что хотели:</legend>
                        <input type="hidden" name="id" value="<?php echo $treatment['id']?>">
                        <input class="form__input" type="text" name="name" placeholder="Вашe имя*" value="<?php echo $treatment['name']?>">
                        <input class="form__input" type="text" name="surname" placeholder="Вашa фамилия" value="<?php echo $treatment['surname']?>">
                        <input class="form__input" type="text" name="email" placeholder="Ваш адрес электронной почты*" value="<?php echo $treatment['email']?>">
                        <textarea class="form__textarea" type="text" name="message" placeholder="Ваш отзыв*"><?php echo $treatment['message']?></textarea>
                        <button class="form__button" type="submit">Изменить</button>
                     </fieldset>
                  </form>
               </div>
            </div>
         </section><!?--/section_one-->

         <footer class="footer">
            <div class="footer__social footer-social-about__me">
               <ul class="footer__social-ul footer-social-ul-about__me">
                  <li class="footer__social-li ">
                     <a href="#"><picture><source srcset="../images/global/Twitter.webp" type="image/webp"><img class="footer__social-img" src="../images/global/Twitter.png" alt="иконка twitter"></picture></a>
                  </li>
                  <li class="footer__social-li">
                     <a href="#"><picture><source srcset="../images/global/skype.webp" type="image/webp"><img class="footer__social-img" src="../images/global/skype.png" alt="иконка skype"></picture></a>
                  </li>         
                  <li class="footer__social-li">
                     <a href="#"><picture><source srcset="../images/global/vk.webp" type="image/webp"><img class="footer__social-img" src="../images/global/vk.png" alt="иконка vk"></picture></a>
                  </li>         
                  <li class="footer__social-li">
                     <a href="#"><picture><source srcset="../images/global/instagram.webp" type="image/webp"><img class="footer__social-img" src="../images/global/instagram.png" alt="иконка instagram"></picture></a>
                  </li>
                  <li class="footer__social-li">
                     <a href="#"><picture><source srcset="../images/global/telegram.webp" type="image/webp"><img class="footer__social-img" src="../images/global/telegram.png" alt="иконка telegram"></picture></a>
                  </li>
                  <li class="footer__social-li-line footer__social-li-line-myworks"></li>
               </ul>
               <div class="footer__social-image footer-social-image-about__me">
                  <picture><source srcset="../images/home/Shape2-1.webp" type="image/webp"><img class="footer__social-img footer-social-img-about__me" src="../images/home/Shape2-1.png" alt="картинка фона социальных сетей"></picture>
                  <picture><source srcset="../images/home/Shape2-3.webp" type="image/webp"><img class="footer__social-img-two" src="../images/home/Shape2-3.png" alt="картинка белого пятна"></picture>
               </div>
            </div>
         </footer>
 
      </div> 
   </div>  

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/script.min.js"></script>   
</body>
</html>