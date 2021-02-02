<?php
// echo "work","<br>";
// echo "<br>";
$route = $_GET['route'];

require_once "config/db.php";
require_once "core/function_db.php";
require_once "core/function.php";

$route = getUrl($route);

//var_dump($route);
// echo "<br>";
//echo "<a href = '../index.php'>На главную</a>";
// echo "<br>";
//2 для подключения к БД нужна переменная $conn 

$conn = connect();



if($route[0] == ""){	
	
	require_once 'template/main.php'; // подключаем страницу с выводом на нее
}
elseif($route[0] == "gallery" && !isset($route[1])){
	

	$query  = "select * from info";
	 $result = select($query);
	 rsort($result); 	 
	require_once "template/gallery.php"; // подключаем страницу с выводом на нее
}
// страница категорий
elseif($route[0] == "cat"){	
	
	require_once "template/cat.php"; 

}
// страница регистрации
elseif($route[0] == "register"){	
	
	require_once "template/register.php"; 

}
elseif($route[0] == "login"){	
	
	require_once "template/login.php"; 

}
// для админ

// для удаления фото в админке $route[2] проверка id фото(чтобы понимать какую конкретно фотку удалять)
elseif($route[0] == 'admin' && $route[1] === 'delete' && isset($route[2])){
	// добавим проверку имеет ли право не пользователь удалить статью, если нет - перекинуть его на главную

        if(getUser()){
        	// удалим из базы
        	$query = "DELETE FROM info WHERE id =".$route[2];
        	// ниже 2 строки - для удаления с диска (порядок важен)
        	$queryForDel = "SELECT * FROM info WHERE id =".$route[2];
        	$resForDel = select($queryForDel); // получили массив с именем файла
        	// выполним запрос на удаление из БД
        	execQuery($query);       	
        	
        	// и удалим фото из папки        	
        		// это полное имя
        	$fname = './img/gallery/'.$resForDel[0]['image'];
        		// ф-я удаления
        	fileDel($fname);        	

        	header("Location: /admin");
        	exit;
        }
        $query = 'SELECT * FROM info';
        $result = select($query); 
        rsort($result);   	
    	require_once 'template/admin.php';
}

// создание фото
elseif($route[0] == 'admin' && $route[1] === 'create' && !isset($route[2])){
	require_once 'template/create.php';
}

elseif($route[0] == "admin" && !isset($route[1])){
	$query = 'SELECT * FROM info';
    $result = select($query);
    rsort($result); 	
	require_once "template/admin.php"; 

}

elseif($route[0] == "logout"){
	$query = 'SELECT * FROM info';
    $result = select($query);	
	require_once "template/logout.php"; 

}


// ----- 404 ----------

else{
	require_once "template/404.php";
}


?>