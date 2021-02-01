// ========Закрепить меню вверху когда прокручиваем - к top 0
window.addEventListener('scroll', menuOnTop);
let menu = document.querySelector(".menu");

function menuOnTop(){
	if(document.documentElement.scrollTop>20){
		menu.style.top = '0px';
		//menu.style.position = "fixed";
		menu.style.transition = ".3s";// для обычного меню

		
		
	}else if(document.documentElement.scrollTop<20){
		menu.style.top = '0px';
			
	}
	
}

//==========Открытие мобильного меню

let hamb = document.querySelector('.hamburger');
let wmm = document.querySelector('.wrap_mobile_menu');
let mmb = document.querySelector('.mobile_menu_button');
hamb.addEventListener('click', openMobMenu);

function openMobMenu(){
	wmm.classList.toggle('menu_visible');
	mmb.classList.toggle('mobile_menu_button_down');	
	wmm.style.transition = ".3s";
// для информации
// стили 
// .menu_visible{
// 	opacity: 1;	
// 	height: 70vh;
// }
// .mobile_menu_button{
	
// }
// .mobile_menu_button_down{
// 	width: 40px;
// 	height: 40px;
// 	background-image: url(../img/header/times-solid_1.svg);
// 	background-repeat: no-repeat;
// 	background-size: contain;
// 	transition: .3s;
// 	transform: rotate(360deg);
// }
}

//=======BeforeAfter===========page3



let wrap3 = document.querySelector(".wrap3");
if(wrap3){
// Класс DoBox - конструктор блоков с классом "box"
	class DoBox {
		constructor(){		

		}		
			makediv(bgImgLeft, bgImgRight){			
			this.divBox = document.createElement('div');
			wrap3.append(this.divBox);
			this.divBox.className = "box";			
					

			this.bgImgLeft = bgImgLeft; 
			this.divLeftImg = document.createElement('div');
			this.divBox.append(this.divLeftImg);
			this.divLeftImg.className = "left_img";
			this.divLeftImg.style.backgroundImage = this.bgImgLeft;
				

			this.bgImgRight = bgImgRight;
			this.divRightImg = document.createElement('div');
			this.divBox.append(this.divRightImg);
			this.divRightImg.className = "right_img";
			this.divRightImg.style.backgroundImage = this.bgImgRight;			
			
			}		
		
	}

//Чтобы добавить блок-слайд вызываем метод makediv("путь к левому фото", 
//"путь к правому фото"). Все фото подготавливаются одного размера заранее
//В данном примере 640х400 см.стили
	let box = new DoBox();
	box.makediv('url(img/slider/1.jpg)', 'url(img/slider/2.jpg)');	
	box.makediv('url(img/slider/3.jpg)', 'url(img/slider/4.jpg)');
	box.makediv('url(img/slider/5.jpg)', 'url(img/slider/6.jpg)');



	
// Изменение размеров левого фото
let rng = document.querySelector('.rng');
// Поверх фото находится инпут тип range с классом '.rng'. При изменении положения движка
//вызывается функция change
rng.addEventListener('input', change);
//Выбираем всю коллекцию фото в левом блоке (range одновременно меняет ширину у всех левых фото, 
// (для простоты) для этого в функции change запускаем перебор коллекции левых фото)
let divLeftImgAll = document.querySelectorAll('.left_img');

//Для работы функции change вычислим ширину фото слева(достаточно первого)
let fotoLeft = document.querySelector('.left_img');
const fotoLeftWidth = fotoLeft.clientWidth;


	function change(){

				for(let img of divLeftImgAll){

				leftW = +rng.value+fotoLeftWidth;// переменная, в которую записывается начальное
				//положение движка input range(rng.value + значение половины ширины 
				//фото, для синхронности движения input range и правой границы фотографии)
				// и ниже - ширина левого фото равна значению положения движка
				//console.log(leftW);
				img.style.width = leftW+'px';
				img.style.transition = '.2s';
				}
			}


// 
			
			
//----переходы между слайдами по стрелкам вправо влево

let btn_right = document.querySelector('.arrow_right');
btn_right.addEventListener('click', plus);
let btn_left = document.querySelector('.arrow_left');
btn_left.addEventListener('click', minus);

let boxes = document.querySelectorAll('.box');
let count = 0;
boxes[0].className = 'box visible';

//Делаем доты-----------
let boxDot = document.querySelector('.box_dot');
boxDot.style.display = 'flex';
boxDot.style.justifyContent = 'center';

for(let amt =0 ; amt < boxes.length; amt++){	
	divDot = document.createElement('div');
	boxDot.append(divDot);
	divDot.className = "dot";
	divDot.id = amt;
	divDot.style.borderRadius = '50%';
	divDot.style.backgroundColor = '#D2D2D2';	
	divDot.style.width = '15px';
	divDot.style.height = '15px';
	divDot.style.marginLeft = '5px';
}
//выберем все доты чтобы потом в plus minus их подкрашивать 
//и анимировать
//(алгоритм тот же что и переходы между слайдами)
let divDots = document.querySelectorAll('.dot');

//Первый дот сделаем темнее (активный)
divDots[0].style.backgroundColor = '#95633E';
//console.log(boxes.length);


function plus(){
	reset();
	//Доты - окрашивание активных и анимация
	divDots[count].style.backgroundColor = '#D2D2D2';
	divDots[count].style.animation = 'none';
	// делаем box'ы видимыми
    boxes[count].classList.remove('visible');
	if(count < boxes.length-1){		
		count++;
		boxes[count].classList.add('visible');
		
		divDots[count].style.backgroundColor = '#95633E';
		divDots[count].style.animation = 'anidot .5s';
				
		
	}else{
		count = 0;		
		boxes[count].classList.add('visible');
		divDots[count].style.backgroundColor = '#95633E';
		divDots[count].style.animation = 'anidot .5s';
	}	
}
function minus(){
	reset();
	
	divDots[count].style.backgroundColor = '#D2D2D2';
	divDots[count].style.animation = 'none';

    boxes[count].classList.remove('visible');
	if(count <= 0){		
		count = boxes.length;
		count--;
		boxes[count].classList.add('visible');
		divDots[count].style.backgroundColor = '#95633E';
		divDots[count].style.animation = 'anidot .5s';		
		
	}else{
		count--;		
		boxes[count].classList.add('visible');
		divDots[count].style.backgroundColor = '#95633E';
		divDots[count].style.animation = 'anidot .5s';
	}	
}


 //сброс ширины левой картинки и положения input range после пролистывания слайдера
function reset(){
	for(let img of divLeftImgAll){
				rng.value = 0;
				leftW = +rng.value + fotoLeftWidth;					
				img.style.width = leftW+'px';
				img.style.transition = '.3s';
			}
}


	

}

// ======== для формы обратной связи
let name = document.querySelector('.name');
let mail = document.querySelector('.mail');
let message = document.querySelector('.message');
let btnfos = document.querySelector('.btn_fos');
let result = document.querySelector('.result');

if(btnfos){	

btnfos.addEventListener('click', fSend);

function fSend(){

	let sendArr = [];
sendArr[0] = name.value;
sendArr[1] = mail.value;
sendArr[2] = message.value;
//console.log(sendArr);
	
	fetch('core/mail.php', {
			method: 'POST', // *GET, POST, PUT, DELETE, etc.
   			headers: {
      		//'Content-Type': 'application/json'
      		'Content-Type': 'application/x-www-form-urlencoded',
    		},
  			  
   			 //body: "mail=" + out.value, // body data type must match "Content-Type" header
   			 //body: JSON.stringify(data),
   			 body: JSON.stringify(sendArr),
		})
		.then(function(response){
			return response.text();
			//return response.json();
		})
		.then(function(response){
			console.log(response);
			result.innerHTML = response;
		})	
}

// анимация дня недели
let date = new Date();
let day;
//let day = date.getDay();
console.log(date.getDay());

let hour = date.getHours();
console.log(hour);

if(date.getDay() == 0){
	day = 6;
}
else{
	day = date.getDay()-1;
}

let addrs = document.querySelectorAll('.dot_item');

addrs[day].style.animation = 'dotzoom 2s infinite';


if(day == 5 || day ==6 || hour <10 || hour >= 18){
		addrs[day].style.backgroundColor = 'red';
	}	
else{
	addrs[day].style.backgroundColor = 'green';
}

}
// очистка формы после нажатия кнопки отправить
let btn_fos = document.querySelector('.btn_fos');
if(btn_fos){

btn_fos.addEventListener('click', clearForm);



function clearForm(){
	let name = document.querySelector('.name');
	let mail = document.querySelector('.mail');
	let message = document.querySelector('.message');

	name.value = '';
	mail.value = '';
	message.value = '';	

}

}
// вывод на страницу gallery по 20 фото
let gallery_img = document.querySelectorAll('.gallery_img');
let count_img = 20; // по сколько будем открывать фоток
let btn_img = document.querySelector('.btn_img');

if(btn_img){

rest = gallery_img.length-count_img;
		if(rest <= 0){
			rest = 'nėra';
		}
		
		btn_img.innerHTML = " Daugiau "+' '+rest+'';

			if(gallery_img.length < count_img){
				count_img = gallery_img.length;	
					for(i = 0; i < count_img; i++){	
					gallery_img[i].classList.add('img_visible');
			}			
		}
			else{
				for(i = 0; i < count_img; i++){	
				gallery_img[i].classList.add('img_visible');
			}

		}		


gallery_img = document.querySelectorAll('.gallery_img:not(.img_visible)');




function openFoto(){

		gallery_img = document.querySelectorAll('.gallery_img:not(.img_visible)');
				
		rest = gallery_img.length-count_img;
		if(rest <= 0){
			rest = 'nėra';
		}
		
		btn_img.innerHTML = " Daugiau "+' '+rest+'';

			if(gallery_img.length < count_img){
				count_img = gallery_img.length;	
					for(i = 0; i < count_img; i++){	
					gallery_img[i].classList.add('img_visible');
			}			
		}
			else{
				for(i = 0; i < count_img; i++){	
				gallery_img[i].classList.add('img_visible');
			}

		}		
	
}
}