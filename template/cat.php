<?php
$route = $_GET['route'];
$cat = $_POST['sel'];
//var_dump($cat);
if($cat == ''){
	
	header('Location: /gallery');
	//exit("<meta http-equiv='refresh' content='0; url= /gallery'>");
	exit();
}
$query  = 'select * from info where cid ='."'$cat'";// в $cat попадает description из таблицы category. Это происходит после передачи POST из файла form на эту страницу

$result = select($query);
// выводим все, что пападает под эту категорию
// $out = "<div class= 'page page_content'>";
// $out .= "<div class = 'wrap'>";
// $out .= "<div class ='gallery_wrap'>";
// $out = "";
for($i = 0; $i < count($result); $i++){
	$out .="<div class ='gallery_img img_visible'>";
	$out .= '<img src ="/img/gallery/'.$result[$i]['image'].'" alt = "'.$result[$i]["description"].'"width = 200>';
	$out .= '<p>'.$result[$i]["description"].'</p>';	
	$out .= '</div>';
}
//echo $out;
?>


<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<title>Gutalinas</title>

</head>
<body>	
<?php include"header_second.php";?>	

<!-- ======================== -->
<div class="page page_cat">
		<div class="wrap">
			<div class="wrap_title">
				<h1>Fotogalerija</h1>				
			</div>
			<div class="wrap_subtitle">
				<h2><?php echo $_POST['sel'];?></h2>
			</div>
			<!-- <div class="wrap_subtitle">
				<p class="links"><a href="index.php">Pradžia / </a><a href="gallery">Fotodalerija / </a><?php //echo $_POST['sel'];?></p>
			</div> -->
			
		</div>
</div>
<!-- Форма - фильтр категорий -->
<div class="page page_form_filter">
	<div class="wrap">
		<div class="wrap_links">
			<p class="links"><a href="index.php">Pradžia / </a><a href="gallery">Fotogalerija / </a><a><?php echo $_POST['sel'];?></a></p>
		</div>	
	<?php require "form.php";?> 
	</div>
</div>
<!-- -------------------------------- -->

<!-- ==== Вывод галереи на страницу ======== -->
<div class = 'page page_content'>
	<div class = 'wrap'>
		<div class ='gallery_wrap'>
<?php
echo $out;
?>
</div></div></div>;
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

