<?php
if(isset($_POST['submit'])){
	// проверка есть ли пользователь в БД

$user = login($_POST['login'], $_POST['password']);
if($user){ // если пользователь существует, сгенерируем hash и ip
	// обновление инф-ии о пользователе hash ip
	$hash = md5(generateCode(10));// сгенерируем hash для пользователя
	// теперь после логина в hash будет лежать случайное число. Его будем записывать в куки
	$ip = null;
	$user = $user[0]; // переведем в строку  и запишем в переменную $user
	$ip = $_SERVER['REMOTE_ADDR']; // получим ip адрес пользователя			

// теперь обновим пользователя в БД - это будет функция
updateUser($user['id'], $hash, $ip);
// после логина мы должны сохранить куки
setcookie('id', $user['id'], time()+60*60*24*30, "/");
setcookie('hash', $hash, time()+60*60*24*30, "/");
// и отправляем пользователя в админ панель
header("Location: /admin");
//exit("<meta http-equiv='refresh' content='0; url= /admin'>");
exit();

}
else{
		 $errLogin = " Неправильно ввели имя пользователя или пароль";
	}
}
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
<div class="admin_form">
	<div class="admin_form_register">
		<h2>Авторизация</h2>
<form method="POST">
	<input type="text" name="login" required="" placeholder="Логин"><br>
	<input type="password" name="password" required="" placeholder="Пароль"><br>
	<input type="submit" name="submit" id="" value="Войти">

</form>

<p><a class="admin_form_link" href="gallery">В галерею</a></p>
<p><a class="admin_form_link" href="register">Регистрация</a></p>
<?php
echo $errLogin;
?>
<br>
	</div>
	
</div>

</body>
</html>