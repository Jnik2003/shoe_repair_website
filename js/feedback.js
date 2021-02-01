
let sliders = document.querySelectorAll('.slider_box');

let countslide = 0;


let page5_arrow_right = document.querySelector('.page5_arrow_right');

page5_arrow_right.addEventListener('click', plus);

let page5_arrow_left = document.querySelector('.page5_arrow_left');

page5_arrow_left.addEventListener('click', minus);


//console.log(sliders.length);

//Делаем доты-----------
let boxDot5 = document.querySelector('.box5_dot');
boxDot5.style.display = 'flex';
boxDot5.style.justifyContent = 'center';

for(let i =0 ; i < sliders.length; i++){	
	divDot5 = document.createElement('div');
	boxDot5.append(divDot5);
	divDot5.className = "dot5";
	divDot5.id = i;
	divDot5.style.borderRadius = '50%';
	divDot5.style.backgroundColor = '#D2D2D2';	
	divDot5.style.width = '15px';
	divDot5.style.height = '15px';
	divDot5.style.marginLeft = '5px';

}
let divDots5 = document.querySelectorAll('.dot5');
divDots5[0].style.backgroundColor = '#95633E';
sliders[countslide].style.opacity = "1";

function plus(){
	divDots5[countslide].style.backgroundColor = '#D2D2D2';
	divDots5[countslide].style.animation = 'none';
	clearInterval(timerId);
	sliders[countslide].style.opacity = "0";

	sliders[countslide].style.animation = 'none';
	
	if(countslide < sliders.length-1){
		countslide++;
		
		sliders[countslide].style.opacity = "1";
		divDots5[countslide].style.backgroundColor = '#95633E';
		divDots5[countslide].style.animation = 'anidot .5s';
		sliders[countslide].style.animation = 'anislide2 .5s';
		
	}
	else{
		countslide = 0;	
			
		sliders[countslide].style.opacity = "1";
		divDots5[countslide].style.backgroundColor = '#95633E';
		divDots5[countslide].style.animation = 'anidot .5s';
		sliders[countslide].style.animation = 'anislide2 .5s';
	}
}
function minus(){
	clearInterval(timerId);
	
	divDots5[countslide].style.backgroundColor = '#D2D2D2';
	divDots5[countslide].style.animation = 'none';

    sliders[countslide].style.opacity = "0";
    sliders[countslide].style.animation = 'none';

	if(countslide <= 0){		
		countslide = sliders.length;
		countslide--;
		
		sliders[countslide].style.opacity = "1";
		sliders[countslide].style.animation = 'anislide .5s';

		divDots5[countslide].style.backgroundColor = '#95633E';
		divDots5[countslide].style.animation = 'anidot .5s';	
			
		
	}else{
		countslide--;
		sliders[countslide].style.animation = 'anislide .5s';
		sliders[countslide].style.opacity = "1";
		divDots5[countslide].style.backgroundColor = '#95633E';
		divDots5[countslide].style.animation = 'anidot .5s';
		
	}	
}

let timerId = setInterval(() => autoplus(), 15000);

function autoplus(){
	divDots5[countslide].style.backgroundColor = '#D2D2D2';
	divDots5[countslide].style.animation = 'none';
	sliders[countslide].style.animation = 'none';

	sliders[countslide].style.opacity = "0";
	
	if(countslide < sliders.length-1){
		countslide++;
	
		sliders[countslide].style.opacity = "1";
		divDots5[countslide].style.backgroundColor = '#95633E';
		divDots5[countslide].style.animation = 'anidot .5s';
		sliders[countslide].style.animation = 'anislide2 .5s';
		
		
		
	}
	else{
		countslide = 0;	
			
		sliders[countslide].style.opacity = "1";
		sliders[countslide].style.animation = 'anislide2 .5s';
		divDots5[countslide].style.backgroundColor = '#95633E';
		divDots5[countslide].style.animation = 'anidot .5s';

	}
}
