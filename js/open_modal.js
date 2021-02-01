// ===== Модальное окно ===========

		let modal = document.querySelector('.modal')
		let imgModal = document.querySelector('.modal-content');
		let caption = document.querySelector('.caption');	 
		
		let wrapgal = document.querySelector('.gallery_wrap');
		
		if(wrapgal){
			wrapgal.addEventListener('click', funcOpenModal);
			modal.addEventListener('click', funcCloseModal);
			function funcOpenModal(){		
			
			if(event.target.tagName == "IMG"){
				modal.style.display = 'block';					

				imgModal.src = event.target.src;
				imgModal.style.width = "65%";
				caption.innerHTML = event.target.alt;
			
		}else{
			return;
			}				
		};
		}
		

		


		function funcCloseModal(){
			modal.style.display = 'none';					
		}