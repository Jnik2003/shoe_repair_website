<?php
//Логика кода на этой странице. Это админ панель. Соответственно, если сюда зайдет авторизованный пользователь - все нормально. Если же нет - его должно перебросить на страницу login. Чтобы это сделать написана функция getUser которая возвращает true если пользователь зарегистрирован в системе и false если нет. Логика работы getUser -  в function.php

if (!getUser()){
	header('Location: /login');
	echo "no user";
	
}
$out = "<div class = 'wrap'>";
$out .= "<div class ='gallery_wrap'>";
for($i = 0; $i < count($result); $i++){
	$out .="<div class ='gallery_img  img_visible'>";
	$out .= '<img src ="/img/gallery/'.$result[$i]['image'].'" alt = "'.$result[$i]["description"].'"width = 200>';
	$out .= '<div><a href = "/admin/delete/'.$result[$i]['id'].'"">Удалить</a></div>';
	
	$out .= '<p>'.$result[$i]["description"].'</p>';	
	$out .= '</div>';
}
$out .= '</div></div>';

// в строке 14 формируется ссылка на удаление. !!! там есть id статьи. Далее снова идем в index.php и до роута admin вставляем блок с отбором записи с этим id

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Gutalinas</title>

</head>
<body>
	<h1>Админ панель</h1>
	
<?php require_once "modal.php";?>

<!-- -->
<div><a href="/admin/create">Создать</a></div>
<div><a href="/logout">Выход</a></div>
<script src="js/open_modal.js"></script>
</body>

<?php
echo $out;
?>