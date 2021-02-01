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
		 echo " Неправильно ввели имя пользователя или пароль"."<a href = 'register'> Регистрация </a>" ;
	}
}
?>

<h2>Авторизация</h2>
<form method="POST">
	Логин: <input type="text" name="login" required=""><br>
	Пароль: <input type="text" name="password" required=""><br>
	<input type="submit" name="submit" id="" value="Войти">
</form>
<a href="register">Регистрация</a>