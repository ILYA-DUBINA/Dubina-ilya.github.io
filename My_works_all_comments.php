<?php   // require "php/dispatch.php";
   require "php/connect.php";
?>

<!DOCTYPE html>
<html lang="ru">
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
   <title>My_site</title>
</head>   
<body>  

   <div class="cocoon">
      <div class="container">    

         <header class="header">
            <div class="header__content header__content-myworks">
               <div class="header__content-image header__content-image-myworks">
                  <a href="http://dubina-ilya.site/php/admin/entrance_admin.php"><picture><source srcset="images/home/знак.webp" type="image/webp"><img class="header__image-img" src="images/home/знак.jpg" alt="иконка моего сайта"></picture></a>
               </div>
               <div class="header__burger">
                  <span></span>
               </div>
               <nav class="header__content-nav header__content-nav-myworks">
                  <ul class="header__nav-ul">
                     <li class="header__nav-li">
                        <a href="http://dubina-ilya.site/index.php" style="background: url('images/home/Shape12.png') 0 0/100% 100% no-repeat;">Главная</a>
                     </li>
                     <li class="header__nav-li">
                        <a href="http://dubina-ilya.site/About_me.php" style="background: url('images/home/Shape12.png') 0 0/100% 100% no-repeat;">Обо мне</a>
                     </li>
                     <li class="header__nav-li">
                        <a href="http://dubina-ilya.site/Contacts.php" style="background: url('images/home/Shape12.png') 0 0/100% 100% no-repeat;">Контактная информация</a>
                     </li>
                  </ul>
               </nav>
            </div>
         </header>

         <section class="page myworks">    
            <div class="myworks__content">
               <div class="myworks__content-sits">
                  <div class="sits__image border-right">
                     <a href="http://first-restaurant.space/#sidebar"><picture><source srcset="images/my_works/1-1).webp" type="image/webp"><img class="sits__image-img" src="images/my_works/1-1).png" alt="картинка сайта моей верстки"></picture></a>
                  </div>
                  <div class="sits__image border-left">
                     <a href="http://dinlion-project-concept.space/"><picture><source srcset="images/my_works/2-1).webp" type="image/webp"><img class="sits__image-img" src="images/my_works/2-1).png" alt="картинка сайта моей верстки"></picture></a>
                  </div>
                  <div class="sits__image border-bottom">
                     <a href="http://shophia.space/"><picture><source srcset="images/my_works/3-1).webp" type="image/webp"><img class="sits__image-img" src="images/my_works/3-1).png" alt="картинка сайта моей верстки"></picture></a>
                  </div>
               </div>
               <div class="myworks__content-pedicle">
               </div>
               <div class="myworks__content-comments">       
                  
                  <?php 
                     $id_q = mysqli_query($connection, "SELECT COUNT(id) FROM comments");
                     $maxId = mysqli_fetch_array($id_q, MYSQLI_NUM);

                        echo '<a href="My_works.php">Вернуться'; 
                        echo '</a>'; 
                  ?>   
                  
                  
                  <?php function getComment($row){ ?>   
                  <div class="comments__users" id="<?php echo $row['id'];?>">
                     <div class="comments__user">
                        <div class="comments__user-image">
                           <img class="comments__user-img" src="https://www.gravatar.com/avatar/<?php echo md5($row['email']); ?>" alt="картинка комментатора">
                        </div>
                        <div class="comments__user-text">
                           <span class="text__name"><?php echo $row['name']?> &nbsp; <?php echo $row['surname']; ?></span>
                           <span class="text__date"><?php echo date("d.m.Y в H:i", strtotime($row['date'])); ?></span>
                           <p class="text__text"><?php echo $row['message']; ?></p>
                           <div class="text__links">                       
                              <a class="text__link" href="#answer" id="<?php echo $row['id'];?>">Ответить(дополнить)</a> &nbsp;    
                              <?php if($row['idUser'] == $_SERVER['REMOTE_ADDR']){?>
                                 <a href="php/update.php?id=<?php echo $row['id']; ?>">Изменить</a> &nbsp;                               
                                 <a href="php/delete.php?id=<?php echo $row['id']; ?>">Удалить</a>                       
                              <?php }?>
                           </div>
                        </div>
                     </div>                        
                  </div>                                                    
                  <?php 
                     global $connection;            
                     $res = mysqli_query($connection, "SELECT * FROM comments WHERE parent_id=" . $row['id']); 
                        if(mysqli_num_rows($res) > 0){                                          
                           while ($resTwo = mysqli_fetch_assoc($res)) {
                              getCommentDown($resTwo);
                           }
                        } 
                  }; ?>

                  <?php function getCommentDown($resTwo){ ?>           
                     <div class="comments__user-down-text">
                        <div class="comments__user-image">
                           <img class="comments__user-img" src="https://www.gravatar.com/avatar/<?php echo md5($resTwo['email']); ?>" alt="картинка комментатора">
                        </div>
                        <div class="comments__user-text">
                           <span class="text__name"><?php echo $resTwo['name']?> &nbsp; <?php echo $resTwo['surname']; ?></span>
                           <span class="text__date"><?php echo date("d.m.Y в H:i", strtotime($resTwo['date'])); ?></span>
                           <p class="text__text"><?php echo $resTwo['message']?></p>
                           <div class="text__links">         
                              <?php if($resTwo['idUser'] == $_SERVER['REMOTE_ADDR']){?>
                                 <a href="php/update.php?id=<?php echo $resTwo['id']?>">Изменить</a> &nbsp;                               
                                 <a href="php/delete.php?id=<?php echo $resTwo['id']?>">Удалить</a>   
                              <?php }?>
                           </div>
                        </div>                      
                     </div>
                  <?php } ;?>


                  
                  <div class="myworks__content-comments-body">
                     <?php
                     $result = mysqli_query($connection, "SELECT * FROM comments WHERE parent_id = 0");                     
                        while ($row = mysqli_fetch_assoc($result)) {
                           getComment($row);   
                        } 
                     ?>
                  </div>
   

                  <div class="comments__user-down">
                     <form class="comments__user-down-form" id="answer" action="#" method="POST">
                        <fieldset class="form__fieldset">
                           <legend class="form__legend">Ответ или дополнение к комментарию:</legend>
                           <p style="color: red; font-size: 16px; text-align: center;" id="msgDown"></p>       
                           <input class="form__input req-down name-down" id="name" type="text" name="name" placeholder="Ваше имя*">
                           <input class="form__input surname-down" id="surname" type="text" name="surname" placeholder="Вашa фамилия">
                           <input class="form__input req-down email-down" id="email" type="text" name="email" placeholder="Ваш адрес электронной почты*">
                           <textarea class="form__textarea req-down message-down" id="message" type="text" name="message" placeholder="Ваш отзыв*"></textarea>     
                           <input type="hidden" name="parent_id" id="parent_id" value="0"/>     
                           <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SERVER['REMOTE_ADDR'];?>"/>                   
                           <input type="hidden" id="date" value="<?php echo date("d.m.Y в H:i"); ?>"/>                     
                           <button class="form__button down" type="submit" >Отправить</button>
                        </fieldset>
                     </form>
                  </div>   

               </div>
               <div class="myworks__content-form">
                  <form class="form__form" id="form" action="#" method="POST">
                     <fieldset class="form__fieldset">
                        <legend class="form__legend">Пожалуйста оставьте свой отзыв. Cпасибо:</legend>                                          
                        <p style="color: red; font-size: 16px;" id="msg"></p>                                                  
                        <input class="form__input req name" id="nameUp" type="text" name="name" placeholder="Вашe имя*"/>
                        <input class="form__input surname" id="surnameUp" type="text" name="surname" placeholder="Вашa фамилия"/>
                        <input class="form__input req email" id="emailUp" type="text" name="email" placeholder="Ваш адрес электронной почты*"/>
                        <textarea class="form__textarea req  message" id="messageUp" type="text" name="message" placeholder="Ваш отзыв*"></textarea>     
                        <input type="hidden" name="parent_id" id="parent_id" value="0"/>    
                        <input type="hidden" name="idUser" id="idUser" value="<?php echo $_SERVER['REMOTE_ADDR'];?>"/>               
                        <button class="form__button" type="submit" id="<?php echo $idUser; ?>">Отправить</button>
                     </fieldset>
                  </form>
               </div>
            </div>
         </section><!?--/section_one-->

         <footer class="footer">
            <div class="footer__social footer-social-about__me">
               <ul class="footer__social-ul footer-social-ul-about__me">
                  <li class="footer__social-li">
                     <a href="https://twitter.com/Dubina_Ilya"><picture><source srcset="images/global/Twitter.webp" type="image/webp"><img class="footer__social-img" src="images/global/Twitter.png" alt="иконка twitter"></picture></a>
                  </li>
                  <li class="footer__social-li">
                     <a href="https://join.skype.com/invite/HGkYuQt7W98T"><picture><source srcset="images/global/skype2.webp" type="image/webp"><img class="footer__social-img" src="images/global/skype2.png" alt="иконка skype"></picture></a>
                  </li>
                  <li class="footer__social-li">
                     <a href="https://vk.com/id220488562"><picture><source srcset="images/global/vk2.webp" type="image/webp"><img class="footer__social-img" src="images/global/vk2.png" alt="иконка vk"></picture></a>
                  </li>
                  <li class="footer__social-li">
                     <a href="https://www.instagram.com/8ilyadubina8/"><picture><source srcset="images/global/instagram.webp" type="image/webp"><img class="footer__social-img" src="images/global/instagram.png" alt="иконка instagram"></picture></a>
                  </li>
                  <li class="footer__social-li">
                     <a href="https://t.me/Dubina_ilya"><picture><source srcset="images/global/telegram2.webp" type="image/webp"><img class="footer__social-img" src="images/global/telegram2.png" alt="иконка telegram"></picture></a>
                  </li>
                  <li class="footer__social-li-line footer__social-li-line-myworks"></li>
               </ul>
               <div class="footer__social-image footer-social-image-about__me">
                  <picture><source srcset="images/home/Shape2-1.webp" type="image/webp"><img class="footer__social-img footer-social-img-about__me" src="images/home/Shape2-1.png" alt="картинка фона социальных сетей"></picture>
                  <picture><source srcset="images/home/Shape2-3.webp" type="image/webp"><img class="footer__social-img-two" src="images/home/Shape2-3.png" alt="картинка белого пятна"></picture>
               </div>
            </div>
         </footer>
 
      </div> 
   </div>  

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="js/script.min.js"></script>   
</body>
</html>