"use strict";

document.addEventListener('DOMContentLoaded', function () {
   

// ; 

// ; 


//? открытие меню бургер на jQuery------------------------------------------
$(document).ready(function(){
   $('.header__burger').click(function(event){
      $('.header__content-nav, .header__burger').toggleClass('active');
      $('body').toggleClass('_lock');
   });
});

//? динамический адаптив(кузнечик) на JS ------------------------------------------
function DynamicAdapt(type) {
	this.type = type;
}

DynamicAdapt.prototype.init = function () {
	const _this = this;
	// массив объектов
	this.оbjects = [];
	this.daClassname = "_dynamic_adapt_";
	// массив DOM-элементов
	this.nodes = document.querySelectorAll("[data-da]");

	// наполнение оbjects объктами
	for (let i = 0; i < this.nodes.length; i++) {
		const node = this.nodes[i];
		const data = node.dataset.da.trim();
		const dataArray = data.split(",");
		const оbject = {};
		оbject.element = node;
		оbject.parent = node.parentNode;
		оbject.destination = document.querySelector(dataArray[0].trim());
		оbject.breakpoint = dataArray[1] ? dataArray[1].trim() : "767";
		оbject.place = dataArray[2] ? dataArray[2].trim() : "last";
		оbject.index = this.indexInParent(оbject.parent, оbject.element);
		this.оbjects.push(оbject);
	}

	this.arraySort(this.оbjects);

	// массив уникальных медиа-запросов
	this.mediaQueries = Array.prototype.map.call(this.оbjects, function (item) {
		return '(' + this.type + "-width: " + item.breakpoint + "px)," + item.breakpoint;
	}, this);
	this.mediaQueries = Array.prototype.filter.call(this.mediaQueries, function (item, index, self) {
		return Array.prototype.indexOf.call(self, item) === index;
	});

	// навешивание слушателя на медиа-запрос
	// и вызов обработчика при первом запуске
	for (let i = 0; i < this.mediaQueries.length; i++) {
		const media = this.mediaQueries[i];
		const mediaSplit = String.prototype.split.call(media, ',');
		const matchMedia = window.matchMedia(mediaSplit[0]);
		const mediaBreakpoint = mediaSplit[1];

		// массив объектов с подходящим брейкпоинтом
		const оbjectsFilter = Array.prototype.filter.call(this.оbjects, function (item) {
			return item.breakpoint === mediaBreakpoint;
		});
		matchMedia.addListener(function () {
			_this.mediaHandler(matchMedia, оbjectsFilter);
		});
		this.mediaHandler(matchMedia, оbjectsFilter);
	}
};

DynamicAdapt.prototype.mediaHandler = function (matchMedia, оbjects) {
	if (matchMedia.matches) {
		for (let i = 0; i < оbjects.length; i++) {
			const оbject = оbjects[i];
			оbject.index = this.indexInParent(оbject.parent, оbject.element);
			this.moveTo(оbject.place, оbject.element, оbject.destination);
		}
	} else {
		for (let i = 0; i < оbjects.length; i++) {
			const оbject = оbjects[i];
			if (оbject.element.classList.contains(this.daClassname)) {
				this.moveBack(оbject.parent, оbject.element, оbject.index);
			}
		}
	}
};

// Функция перемещения
DynamicAdapt.prototype.moveTo = function (place, element, destination) {
	element.classList.add(this.daClassname);
	if (place === 'last' || place >= destination.children.length) {
		destination.insertAdjacentElement('beforeend', element);
		return;
	}
	if (place === 'first') {
		destination.insertAdjacentElement('afterbegin', element);
		return;
	}
	destination.children[place].insertAdjacentElement('beforebegin', element);
}

// Функция возврата
DynamicAdapt.prototype.moveBack = function (parent, element, index) {
	element.classList.remove(this.daClassname);
	(parent.children[index] !== undefined) ? parent.children[index].insertAdjacentElement('beforebegin', element) : parent.insertAdjacentElement('beforeend', element); 
}

// Функция получения индекса внутри родителя
DynamicAdapt.prototype.indexInParent = function (parent, element) {
	const array = Array.prototype.slice.call(parent.children);
	return Array.prototype.indexOf.call(array, element);
};

// Функция сортировки массива по breakpoint и place 
// по возрастанию для this.type = min
// по убыванию для this.type = max
DynamicAdapt.prototype.arraySort = function (arr) {
	if (this.type === "min") {
		Array.prototype.sort.call(arr, function (a, b) {
			if (a.breakpoint === b.breakpoint) {
				if (a.place === b.place) {
					return 0;
				}

				if (a.place === "first" || b.place === "last") {
					return -1;
				}

				if (a.place === "last" || b.place === "first") {
					return 1;
				}

				return a.place - b.place;
			}

			return a.breakpoint - b.breakpoint;
		});
	} else {
		Array.prototype.sort.call(arr, function (a, b) {
			if (a.breakpoint === b.breakpoint) {
				if (a.place === b.place) {
					return 0;
				}

				if (a.place === "first" || b.place === "last") {
					return 1;
				}

				if (a.place === "last" || b.place === "first") {
					return -1;
				}

				return b.place - a.place;
			}

			return b.breakpoint - a.breakpoint;
		});
		return;
	}
};
//? короткий вызов ------------------------------------------
const da = new DynamicAdapt("max");  
da.init();

//? ///////////////////динамический адаптив(кузнечик) на JS ---------------------

const link = document.querySelectorAll('.text__link');
const commentsDown = document.querySelector('.comments__user-down');
const contentForm = document.querySelector('.myworks__content-form');


for(let i=0; i<link.length; i++){  
      link[i].addEventListener('click', function(){
      commentsDown.classList.toggle('visible');
      contentForm.classList.toggle('hidden'); 
   });   
};

//? для присваевания кнопке id комментария

$(document).ready(function(){
   $("a.text__link").on('click', function(){       
      $(".text__link").addClass('hiddenThis');

      let id = $(this).attr("id");
      $("#parent_id").attr("value",id);

      // $('button.down').on('click',function(e){         
      //    e.preventDefault();
         
      //    let name = $("#name").val();
      //    let surname = $("#surname").val();
      //    let email = $("#email").val();
      //    let message = $("#message").val();
      //    let date = $("#date").val();      
      //    let parent_id = $("#parent_id").val();      

      //    $.ajax ({
      //       type: "POST",
      //       url: "../php/dispatch.php",         
      //       data: {name: name, surname: surname, email: email, message: message, date: date, parent_id: parent_id},
      //       success: function () { 

               // if(!$("div#"+id).hasClass("comments__user-down-text")){
                  // $("div#"+id).append(                   
                  //    "<div class=\"comments__user-down-text\"><div class=\"comments__user-image\"><img class=\"comments__user-img\" src=\"images/my_works/сube.png\" alt=\"картинка комментатора\"></div><div class=\"comments__user-text\"><span class=\"text__name\">" + name + "&nbsp;" + surname + "</span><span class=\"text__date\">" + date + "</span><p class=\"text__text\">" + message + "</p><div class=\"text__links\"><a href=\"php/update.php?id=<?php echo $resTwo['id']?>\">Изменить</a> &nbsp;<a href=\"php/delete.php?id=<?php echo $row['id']; ?>\">Удалить</a></div></div></div>"
                  // ); 
               // } else{
               //    $("div#"+id+".comments__user-down-text").nextEnd().append(                   
               //       "<div class=\"comments__user-down-text\"><div class=\"comments__user-image\"><img class=\"comments__user-img\" src=\"images/my_works/сube.png\" alt=\"картинка комментатора\"></div><div class=\"comments__user-text\"><span class=\"text__name\">" + name + "&nbsp;" + surname + "</span><span class=\"text__date\">" + date + "</span><p class=\"text__text\">" + message + "</p><div class=\"text__links\"><a href=\"php/update.php?id=<?php echo $resTwo['id']?>\">Изменить</a> &nbsp;<a href=\"php/delete.php?id=<?php echo $row['id']; ?>\">Удалить</a></div></div></div>"
               //    ); 
               // }           
   
      //       }
      //    });

      //    $("#name").val('');
      //    $("#surname").val('');
      //    $("#email").val('');
      //    $("#message").val('');   

      //    $(".text__link").removeClass('hiddenThis');
      //    $(".comments__user-down").removeClass('visible');
      //    $(".myworks__content-form").removeClass('hidden');
      // });   

   });
});

//? ///////////////////////////////////////////////// для присваевания кнопке id комментария

//? валидация формы
if ("http://dubina-ilya.site/My_works.php" === window.location.href){
   const form = document.getElementById('form');
   const answer = document.getElementById('answer');

   form.addEventListener('submit', formSend);
   answer.addEventListener('submit', formSendDown);

   async function formSend(e) {
      e.preventDefault();

      let error = formValidate(form);
      let formData = new FormData(form) 

      if(error === 0){      
         form.classList.add('sending');

         let response = await fetch('../php/dispatch.php', {
            method: 'POST',
            body: formData
         });
         if(response.ok){      
            window.location.reload();
         } else {
            alert("Ошибка");
         }
      } else {
         // alert("Заполните пожалуйста все необходимые поля!");
      }
   }

   async function formSendDown(e) {
      e.preventDefault();

      let errorDown = formValidateDown(answer);
      let formDataDown = new FormData(answer);  

      if(errorDown === 0){
         answer.classList.add('sending');

         let response = await fetch('../php/dispatch.php', {
            method: 'POST',
            body: formDataDown
         });
         if(response.ok){      
            window.location.reload();
         } else {
            alert("Ошибка");
         }
      } else {
         // alert("Заполните пожалуйста все необходимые поля!");
      }
   }

   function formValidate(form) {
      let error = 0;
      let formReq = document.querySelectorAll('.req');
      let surname = document.querySelector('.surname');

      if(nameTest(surname)){
         surname.parentElement.classList.add('error');
         surname.classList.add('error');
         error++;
         let msg = "Не вводите пожалуйста в своем имени, фамилии и сообщении любые символы, кроме букв русского и латинского алфавита, знаков \" _ ! ? . , \", пробела и цифр!";            
         document.getElementById("msg").innerHTML = msg;
      }

      for(let index = 0; index < formReq.length; index++){
         const input = formReq[index];
         formRemoveError(input);

         if(input.value === ''){        
            formAddError(input);
            error++;
            let msg = "Заполните пожалуйста все необходимые поля, при этом в имени, почтовом адресе и сообщении не должно быть менее 2 символов!";
            document.getElementById("msg").innerHTML = msg;         
         } else if(input.classList.contains('name') || input.classList.contains('message')) {
            if(nameTest(input)){
               formAddError(input);
               error++;
               let msg = "Не вводите пожалуйста в своем имени, фамилии и сообщении любые символы, кроме букв русского и латинского алфавита, знаков \" _ ! ? . , \", пробела и цифр!";            
               document.getElementById("msg").innerHTML = msg;
            }  
         } else {  
            if(input.classList.contains('email')) { 
               if(emailTest(input)){     
                  formAddError(input);
                  error++;
                  let msg = "Вы ввели не верный email";            
                  document.getElementById("msg").innerHTML = msg;
               }         
            }
         }
      }

      return error;
   }
   //? ///////////////////////////////////////////валидация формы

   //? валидация  скрытой формы

   function formValidateDown(answer) {
      let error = 0;
      let formReq = document.querySelectorAll('.req-down');
      let surnameDown = document.querySelector('.surname-down');

      if(nameTest(surnameDown)){
         surnameDown.parentElement.classList.add('error');
         surnameDown.classList.add('error');
         error++;
         let msgDown = "Не вводите пожалуйста в своем имени, фамилии и сообщении любые символы, кроме букв русского и латинского алфавита, знаков \" _ ! ? . , \", пробела и цифр!";            
         document.getElementById("msgDown").innerHTML = msgDown;
      }

      for(let index = 0; index < formReq.length; index++){
         const input = formReq[index];
         formRemoveError(input);

         if(input.value === ''){         
            formAddError(input);
            error++;
            let msgDown = "Заполните пожалуйста все необходимые поля, при этом в имени, почтовом адресе и сообщении не должно быть менее 2 символов!";
            document.getElementById("msgDown").innerHTML = msgDown;         
         } else if(input.classList.contains('name-down') || input.classList.contains('message-down')) {
            if(nameTest(input)){
               formAddError(input);
               error++;
               let msgDown = "Не вводите пожалуйста в своем имени, фамилии и сообщении любые символы, кроме букв русского и латинского алфавита, знаков \" _ ! ? . , \", пробела и цифр!";            
               document.getElementById("msgDown").innerHTML = msgDown;
            }  
         } else {  
            if(input.classList.contains('email-down')) {
               if(emailTest(input)){      
                  formAddError(input);
                  error++;
                  let msgDown = "Вы ввели не верный email";            
                  document.getElementById("msgDown").innerHTML = msgDown;
               }
            }         
         }
      }

      return error;
   }

   //? ///////////////////////////////////////////валидация  скрытой формы


   function formAddError(input) {
      input.parentElement.classList.add('error');
      input.classList.add('error');
   }
   function formRemoveError(input) {
      input.parentElement.classList.remove('error');
      input.classList.remove('error');
   }

   function emailTest(input){
      return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
   }
   function nameTest(input){
      return /[^0-9a-zA-Zа-яёА-ЯЁ _?!.,]/u.test(input.value);
   }
   function nameTel(input){
      return /[^+?0-9 _-]$/.test(input.value);
   }
} else {
   const formTel = document.getElementById('formTel');
   formTel.addEventListener('submit', formSendTel);

   async function formSendTel(e) {
      e.preventDefault();

      let errorTel = formValidateTel(formTel);
      let formDataTel = new FormData(formTel);     

      if(errorTel === 0){      
         formTel.classList.add('sending');

         let response = await fetch('../php/myEmail.php', {
            method: 'POST',
            body: formDataTel
         });
         if(response.ok){      
            window.location.reload();
         } else {
            alert("Ошибка");
         }
      } else {
         // alert("Заполните пожалуйста все необходимые поля!");
      }
   }   
   
   //? валидация формы на почту

   function formValidateTel(formTel) {
      let error = 0;
      let formReq = document.querySelectorAll('.req-tel');
      let tel = document.querySelector('.tel');

      if(nameTel(tel)){
         tel.parentElement.classList.add('error');
         tel.classList.add('error');
         error++;
         let msgTel = "Используйте пожалуйста только цифры, знаки + , - , и пробел!";            
         document.getElementById("msgTel").innerHTML = msgTel;
      }

      for(let index = 0; index < formReq.length; index++){
         const input = formReq[index];
         formRemoveError(input);

         if(input.value === ''){         
            formAddError(input);
            error++;
            let msgTel = "Заполните пожалуйста все необходимые поля, при этом в имени, почтовом адресе и сообщении не должно быть менее 2 символов!";
            document.getElementById("msgTel").innerHTML = msgTel;         
         } else if(input.classList.contains('name-tel') || input.classList.contains('message-tel')) {
            if(nameTest(input)){
               formAddError(input);
               error++;
               let msgTel = "Не вводите пожалуйста в своем имени, фамилии и сообщении любые символы, кроме букв русского и латинского алфавита, знаков \" _ ! ? . , \", пробела и цифр!";            
               document.getElementById("msgTel").innerHTML = msgTel;
            }  
         } else {  
            if(input.classList.contains('email-tel')) {
               if(emailTest(input)){      
                  formAddError(input);
                  error++;
                  let msgTel = "Вы ввели не верный email";            
                  document.getElementById("msgTel").innerHTML = msgTel;
               }
            }         
         }
      }

      return error;
   }

   //? ///////////////////////////////////////////валидация формы на почту

   function formAddError(input) {
      input.parentElement.classList.add('error');
      input.classList.add('error');
   }
   function formRemoveError(input) {
      input.parentElement.classList.remove('error');
      input.classList.remove('error');
   }

   function emailTest(input){
      return !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,8})+$/.test(input.value);
   }
   function nameTest(input){
      return /[^0-9a-zA-Zа-яёА-ЯЁ _?!.,]/u.test(input.value);
   }
   function nameTel(input){
      return /[^+?0-9 _-]$/.test(input.value);
   }
}
//? ///////////////////////////////////////////валидация формы

})