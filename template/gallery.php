<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	
	<title>Avalynės taisykla Gutalinas</title>
	<meta name="description" content="Batų taisymas, batų priežiūra, batų dažymas, peilių galandimas, odos tvarkymas">
			
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

	<meta http-equiv="Cache-Control" content="no-cache">

	<meta name="keywords" content="remontas, batai, oda, dirbtuvės">	

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">

</head>
<body>	
	<div  id="Aukštyn"></div>
<?php include"header_second.php";?>	

<!-- ======================== -->
<div class="page page_gallery">
		<div class="wrap">
			<div class="wrap_title">
				<h1>Fotogalerija</h1>
			</div>
			
			<div class="wrap_subtitle">
				<p class="links">Geras darbas vertas&nbsp;fotografijos</p>
			</div>
			
		</div>
</div>

<!-- Форма - фильтр категорий -->
<div class="page page_form_filter">
	<div class="wrap">
	<div class="wrap_links">
			<p class="links"><a href="index.php">Pradžia / </a><a href="gallery">Fotogalerija</a></p>
		</div>		
	<?php require "form.php";?> 
	</div>
</div>

<!-- ==== Вывод галереи на страницу ======== -->

<div class = 'page page_content'>
	<div class = 'wrap'>
		<div class ='gallery_wrap'>
			<?php
				$out .= "";
					for($i = 0; $i < count($result); $i++){
						$out .="<div class ='gallery_img'>";
						$out .= '<img src ="/img/gallery/'.$result[$i]['image'].'" alt = "'.$result[$i]["description"].'">';
						$out .= '<p>'.$result[$i]["description"].'</p>';	
						$out .= '</div>';
					}
					
					echo $out;
			?>
		</div>
		<div class="button-item" >
				
				<button class="btn_img"  onclick="openFoto()">Daugiau</button>
			 </div>
		
	</div>
</div>

<!-- ======= основной код вывод на страницу ====== -->
<?php

//$out = "<div class = 'page page_gallery'>";
//$out .= "<div class = 'wrap'>";
//$out .= "<div class ='gallery_wrap'>";
//for($i = 0; $i < count($result); $i++){
//	$out .="<div class ='gallery_img'>";
//	$out .= '<img src ="/img/gallery/'.$result[$i]['image'].'" alt = "'.$result[$i]["description"].'">';
//	$out .= '<p>'.$result[$i]["description"].'</p>';	
//	$out .= '</div>';
//}
//$out .= '</div></div></div>';
//echo $out;
//?>

 <!-- =================================================== -->
<!--  ===== для модального окна 2 файла ====== -->
 <?php require "modal.php";?>	
 <script src="js/open_modal.js"></script>
<!--  ======================================= -->
<!-- =========== Для анимации 2 файла ================ -->
<script src="js/wow.min.js"></script>
<script src="js/wow.visible.js"></script>

 <script src="js/script.js"></script>
</body>
</html>