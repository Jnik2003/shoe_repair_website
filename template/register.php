<?php

//var_dump($_POST);
$err = []; // массив ошибок 



// проверка, нажата ли кнопка submin иначе запись в БД попадет 2 раза
if(isset($_POST['submit'])){
	$err = []; // массив ошибок
	
	// $login = trim($_POST['login']);
	// $password = md5(md5(trim($_POST['password']))); //чтобы пароль не был виден
	

	if(strlen(trim($_POST['login'])) < 3 || trim(strlen($_POST['login'])) > 30){
		$err[] = " Логин не меньше 4 и не больше 30 ";
	}
	
	if(isLoginExist($_POST['login'])){
		$err[] = "Такой пользователь уже существует";
	}
	//запрос на добавление в БД users если в массиве ошибок ничего нет
	if(count($err) === 0){
		createUser($_POST['login'], $_POST['password']);
		header('Location: /login');
		exit();
		//echo "Регистрация успешно";

	}else{
		echo "<h4> Ошибки регистрации </h4>";
		foreach ($err as $value) {
			echo $value."<br>";
		}
	}

}

	

?>
<h2>Регистрация</h2>
<form method="POST">
	Логин: <input type="text" name="login" required=""><br>
	Пароль: <input type="text" name="password" required=""><br>
	<input type="submit" name="submit" id="" value="Регистрация">

</form>
<a href="login">Авторизация</a>
<br>