<?php

if (!getUser()){
// 	if (headers_sent()) {
//     var_dump(headers_list());
// } 
	//header('Location: /login');
	//echo "no user";	
}
echo "<h2>Добавить фото</h2>";
echo "<a href='/admin'>Выход в админ панель</a>";
//var_dump($_POST);
if(isset($_POST['submit'])){

	$query = "SELECT id FROM info ORDER BY id DESC LIMIT 1";
    $result = select($query); 
   
    $nextId = $result[0]['id']+1;
	
	$cid = $_POST['cid'];
	$description = trim($_POST['description']);
	move_uploaded_file($_FILES['image']['tmp_name'], 'img/gallery/'.$nextId.$_FILES['image']['name']);
	// и теперь, имя файла (для записи в базу данных)
	// после добавоения возможности удаления фото не только из БД  а и с диска появилась проблема. Если загружены файлы с одинаковыми именами, то при удалении фотки из БД, удаляется фото с диска и для других записей в БД это фото не отображается, т.к. его физически нет на диске. Поэтому нужно всем именам фото сделать уникальными/ Будем к имени фото добавлять id
	//для записи в БД 
	
	
	//$image = $_FILES['image']['name'];
	
	imgResize('img/gallery/'.$nextId.$_FILES['image']['name']);


	$image = $nextId.$_FILES['image']['name'];
	
	$create = createArticle($cid, $description, $image);
	// если запись произошла... перенаправить пользователя на эту же страницу 
	// если произошла ошибка записи установим куки с именем alert
	if($create){
		//var_dump($create);
		//header('Location: /admin');
		$out = '';
		$out .= "<br>";
		$out .= "<div class='wrap'>";
		
		$out .= '<img src ="/img/gallery/'.$image.'" width = 150 class="addedfoto">';
		$out .= "<div>Фотография добавлена</div>";
		$out .= "</div>";
		$out .= "<br>";

		
		//exit();
		

		
	}	
	else{
		setcookie("alert", "create error", time()+60*10);
	}
	if(isset($_COOKIE['alert'])){
		$alert = $_COOKIE['alert'];
		setcookie("alert", "", time()-60*10);
		unset($_COOKIE['alert']);
		echo $alert;
	}		 

}


?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href=".././css/style.css">
	<title>Добавить фото</title>
</head>
<body>
	
	<div class="wrap">
		<form action="" method="POST" enctype="multipart/form-data" class="form_add">
	Категория:<?php include "form_create.php"; ?>
	<textarea name="description" placeholder="Описание" cols=35 rows=5></textarea>
	
	Выберите фото: <input type="file" name="image">	
	
	<button type="submit" name="submit">Добавить</button>

</form>
	</div>

<?php
echo $out;
echo $res;
?>
</body>
</html>

