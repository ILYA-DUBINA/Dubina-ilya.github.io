<?php

require "php/connect.php";   

?>


<!DOCTYPE html>
<html lang="en">
   <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="title" property="og:title" content="Site_resume">   
   <meta name="description" property="og:description" content="about me">
   <meta name="image" property="og:image" content="http://dubina-ilya.site/images/home/I2.png">   
   <meta property="og:type" content="website"/>   
   <meta property="og:url" content= "http://dubina-ilya.site/">    
   
   <link rel="stylesheet" href="css/style.min.css">
   <link rel="shortcut icon" href="images/home/знак.jpg">
   <title>Site_resume</title>
</head>   
<body>  

   <div class="cocoon">
      <div class="container">        
         <header class="header">
   <div class="header__content">
      <div class="header__content-image header__content-image-contacts">
         <a href="http://dubina-ilya.site/php/admin/entrance_admin.php"><picture><source srcset="images/home/знак.webp" type="image/webp"><img class="header__image-img" src="images/home/знак.jpg" alt="иконка моего сайта"></picture></a>
      </div>
      <div class="header__burger">
         <span></span>
      </div>
      <nav class="header__content-nav header__content-nav-contacts">
         <ul class="header__nav-ul">
            <li class="header__nav-li">
               <a href="http://dubina-ilya.site/index.php" style="background: url('images/home/Shape12.png') 0 0/100% 100% no-repeat;">Главная</a>
            </li>
            <li class="header__nav-li">
               <a href="http://dubina-ilya.site/About_me.php" style="background: url('images/home/Shape12.png') 0 0/100% 100% no-repeat;">Обо мне</a>
            </li>
            <li class="header__nav-li">
               <a href="http://dubina-ilya.site/My_works.php" style="background: url('images/home/Shape12.png') 0 0/100% 100% no-repeat;">Мои работы</a>
            </li>
         </ul>
      </nav>
   </div>
</header>



         <section class="page bee">
            <div class="bee__content">
               <div class="bee__content-antennae">
                  <div class="antennae-left"></div>
                  <div class="antennae-right"></div>
               </div>
               <div class="bee__content-header"></div>
               <div class="bee__content-contacts">           
                  <div class="contacts__fly-addres-left">                     
                     <div class="addres__linkedin">
                        <div class="addres__linkedin-image">
                           <picture><source srcset="images/global/Linkedin.webp" type="image/webp"><img class="addres__linkedin-img" src="images/global/Linkedin.png" alt="иконка linkedin"></picture>
                        </div>
                        <div class="addres__linkedin-information">
                           <h4 class="addres__linkedin-title">Мой профиль на linkedin:</h4>
                           <span class="addres__linkedin-text"> <a href="https://www.linkedin.com/in/%D0%B8%D0%BB%D1%8C%D1%8F-%D0%B4%D1%83%D0%B1%D0%B8%D0%BD%D0%B0-27a7aa211/">linkedin.com/in/илья-дубина-27a7aa211</a></span>
                        </div>
                     </div>                     
                     <div class="addres__phone">
                        <div class="addres__phone-image">
                           <picture><source srcset="images/global/phone.webp" type="image/webp"><img class="addres__phone-img" src="images/global/phone.png" alt="иконка телефона"></picture>
                        </div>
                        <div class="addres__phone-information">
                           <h4 class="addres__phone-title">Мобильный телефон:</h4>
                           <p class="addres__phone-text"> <a href="tel:+375298399978">+375(29)839-99-78</a></p>
                        </div>
                     </div>                     
                  </div>
                  <div class="contacts__fly-form">                    
                     <form class="form__form bee__form" id="formTel" action="#" method="POST">
                        <fieldset class="form__fieldset bee__fieldset">
                           <legend class="form__legend bee__legend"> &nbsp; Отправить сообщение &nbsp;</legend>
                           <p class="form__p" id="msgTel"></p>         
                           <input class="form__input req-tel name-tel" id="nameTel" type="text" name="name" placeholder="Ваше имя*">
                           <input class="form__input tel" id="phoneTel" type="text" name="phone" placeholder="Ваш телефон*">
                           <input class="form__input bee__input req-tel email-tel" id="emailTel" type="text" name="email" placeholder="Ваш адрес электронной почты*">
                           <textarea class="form__textarea req-tel message-tel" id="messageTel" type="text" name="message" placeholder="Ваш текст сообщения*"></textarea>
                           <button class="form__button" type="submit">Отправить</button>
                        </fieldset>
                     </form>
                  </div>                   
                  <div class="contacts__fly-addres-right">                     
                    <div class="addres__email">
                        <div class="addres__email-image">
                           <picture><source srcset="images/global/email.webp" type="image/webp"><img class="addres__email-img" src="images/global/email.png" alt="иконка email"></picture>
                        </div>
                        <div class="addres__email-information">
                           <h4 class="addres__email-title">Электронная почта:</h4>
                           <p class="addres__email-text"> <a href="mailto:dinlion@yandex.ru">dinlion@yandex.ru</a></p>
                        </div>
                     </div>
                     <div class="addres__home">
                        <div class="addres__home-image">
                           <picture><source srcset="images/global/home.webp" type="image/webp"><img class="addres__home-img" src="images/global/home.png" alt="иконка дома"></picture>
                        </div>
                        <div class="addres__home-information">
                           <h4 class="addres__home-title">Домашний адрес:</h4>
                           <p class="addres__home-text">г. Гомель, ул. Свиридова д.28, кв.12</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section><!?--/section_one-->

         <footer class="footer">
   <div class="footer__social">
      <ul class="footer__social-ul bee__social-ul">
         <li class="footer__social-li bee__social">
            <a href="https://twitter.com/Dubina_Ilya"><picture><source srcset="images/global/Twitter.webp" type="image/webp"><img class="footer__social-img" src="images/global/Twitter.png" alt="иконка twitter"></picture></a>
         </li>
         <li class="footer__social-li bee__social">
            <a href="https://join.skype.com/invite/HGkYuQt7W98T"><picture><source srcset="images/global/skype2.webp" type="image/webp"><img class="footer__social-img" src="images/global/skype2.png" alt="иконка skype"></picture></a>
         </li>
         <li class="footer__social-li bee__social">
            <a href="https://vk.com/id220488562"><picture><source srcset="images/global/vk2.webp" type="image/webp"><img class="footer__social-img" src="images/global/vk2.png" alt="иконка vk"></picture></a>
         </li>
         <li class="footer__social-li bee__social">
            <a href="https://www.instagram.com/8ilyadubina8/"><picture><source srcset="images/global/instagram.webp" type="image/webp"><img class="footer__social-img" src="images/global/instagram.png" alt="иконка instagram"></picture></a>
         </li>
         <li class="footer__social-li bee__social">
            <a href="https://t.me/Dubina_ilya"><picture><source srcset="images/global/telegram2.webp" type="image/webp"><img class="footer__social-img" src="images/global/telegram2.png" alt="иконка telegram"></picture></a>
         </li>
      </ul>
      <div class="footer__social-image bee__footer">
         <picture><source srcset="images/home/Shape2-2.webp" type="image/webp"><img class="footer__social-img" src="images/home/Shape2-2.png" alt="картинка фона социальных сетей"></picture>
      </div>
   </div>
</footer>
 
      </div> 
   </div>
  
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="js/script.min.js"></script> 
</body>
</html>