<?php
// делаем массив из того что попадает в $_GET['route']
function getURL($url){
	return explode("/", $url);
}


function isLoginExist($login){
   $query = "SELECT login FROM users WHERE login = '".$login."'";
	
	$result = select($query);
	if(count($result) === 0){
		return false;
	}else{
		return true;
	}
}
function createUser($login, $password){
    $password = md5(md5(trim($password))); //чтобы пароль не был виден
    $login = trim($login);
    $query = "INSERT INTO users SET login ='".$login."', password = '".$password."'";
    return execQuery($query);
}



// // для страницы login >o<

function login($login, $password){
	$login = trim($login);
	$password = md5(md5(trim($password))); //чтобы пароль не был виден
	$query = "SELECT id, login FROM users WHERE login ='".$login."' AND password = '".$password."'";
	$result = select($query);		
	if (count($result) === 0){		
		return false;
	}
	else{		
		return $result;
	}
}

function generateCode($length = 7){
    $chars = 'sgfsderhjklcv5677HGSATFGHJJKUYHCHFHGDRTGDGDG9797';
    $code ='';
    $clen = strlen($chars)-1;

    while(strlen($code)< $length){
        $code .= $chars[mt_rand(0, $clen)];
    }

    return $code;
}

function updateUser($id, $hash, $ip){
	// если ip пустой обновим только hash

	if(is_null($ip)){
		$query = "UPDATE users SET hash ='".$hash."' WHERE id = ".$id;
	}
	else{
		$query = "UPDATE users SET hash = '".$hash."', ip = INET_ATON('".$ip."') WHERE id = ".$id;
	}
	return execQuery($query);
}
function getUser(){
	// сначала проверяем существуют ли куки. Сейчас есть залогинившийся. Его id и hash  лежат в $_COOKIE['id'] и в $_COOKIE['hash']
	// если они действительно есть.....
	if(isset($_COOKIE['id']) && isset($_COOKIE['hash'])){
		// этим запросом мы отберем залогинившегося пользователя....
		
		$query = "SELECT id, login, hash, INET_NTOA(ip) as ip FROM users WHERE id = ".intval($_COOKIE['id'])." LIMIT 1";

		$user = select($query);
		// если его не  оказалось в массиве $user
		if(count($user) === 0){
			return false; // и со старницы admin.php пользователя  перекинет на страницу login.php
		}
		else{ // иначе... 
			$user = $user[0]; //  в $user запишем $user[0] в котором лежат данные залогинившегося пользователя
			// и проверим, если его hash из БД не равен тем, что есть у него в куках...
			if($user['hash'] !== $_COOKIE['hash']){
				clearCookies(); // очистим куки , вернем false и пользователя перекинет на страницу login
				return false;
			}// также, проверим , если у этого пользователя в БД есть ip адрес ....
			if(!is_null($user['ip'])){
				// если ip из БД не равен текущему ip, то очистим куки , вернем false и пользователя перекинет на страницу login
				if($user['ip'] !== $_SERVER['REMOTE_ADDR']){
					clearCookies();
					return false;
				}
			}
			// если же пользователь зареган, залогинен, у него совпадает ip то он остается в админ панели, на странице admin.php
		$_GET['login'] = $user['login'];
		return true;			
		}
		
	}
	else{
		clearCookies();
		return false;
	}
}


// подчистить куки. время жизни ставим отрицательное
function clearCookies(){
	setcookie('id', '', time()-60*60*24*30, "/");
	setcookie('hash', '', time()-60*60*24*30, "/", null, null, true);
	// также очищаем если в GET есть логин
	unset($_GET['login']);
}

function createArticle($cid, $description, $image){
	$query = "INSERT INTO `info`(`cid`, `description`, `image`) VALUES ('".$cid."', '".$description."', '".$image."')";
	return execQuery($query);
}
function logout(){
	clearCookies();
	header('Location: /gallery');
	exit;
}

function imgResize($filename){
	// изменение размера изображения
// требуемый размер на выходе
$newWidth = 1024;
$newHeight = 768;


// $typeFile = mime_content_type($filename);
// 	if($typeFile === 'image/jpeg'){
	$scr = imagecreatefromjpeg($filename); // или $imagePath
	// var_dump($scr);
	// var_dump($filename);

	$dect = imagecreatetruecolor($newWidth, $newHeight);


//echo "work";

		// определим размер исходного изображения
	$size = getimagesize($filename);
	//var_dump($size);


	//imagecopy($dect, $scr, 0, 0, 0, 0, 4032, 3024);
	imagecopyresampled($dect, $scr, 0, 0, 0, 0, $newWidth, $newHeight, $size[0], $size[1]);

	imagejpeg($dect, $filename);
	imagedestroy($scr);
	imagedestroy($dect);	
	// $filename = '';
	
	
}
function fileDel($fname){
	if(file_exists($fname)){
	 unlink($fname); 	
	}
	else{
		return;
	}
    //if(file_exists($img) == FALSE) echo $img." файл удален";  
}
function stopRegister(){
	$query = "SELECT * FROM `users` WHERE 1";
	$result = select($query);
	
	if($result){
		return true;
	}
	else{
		return false;
	}

}

function spam(){
	$query = "INSERT INTO spam (`ip`) VALUES ('spam')";
	
	execQuery($query);
}

?>