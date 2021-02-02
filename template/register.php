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
	if(stopRegister() == true){
		$err[] = "Регистрация запрещена";
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
		<h2>Регистрация</h2>
<form method="POST">
	<input type="text" name="login" required="" placeholder="Логин"><br>
	<input type="text" name="password" required="" placeholder="Пароль"><br>
	<input type="submit" name="submit" id="" value="Регистрация">

</form>
<a class="admin_form_link" href="login">Авторизация</a>
<br>
	</div>
	
</div>

</body>
</html>
