<?php

//для массива json

$postData = file_get_contents('php://input');


$data = json_decode($postData, true);

//print_r($postData);
if(strlen($data[0]) > 30 || strlen($data[0]) <4){
		echo '<p style="color: red" class="clear">"Vardas" negali būti mažesnis nei 3 ir daugiau nei 30 simbolių</p>';
		//$data[0] = '';		
		exit();
	}
if(strlen($data[2]) > 500){
		echo '<p style="color: red" class="clear">Pranešimas negali būti ilgesnis nei 500 simbolių</p>';
		exit();
	}

if(isset($data) && $data[1] != '' && $data[0] != ''){
	$name = trim($data[0]);  //имя отправителя
	$name = filter_var($name, FILTER_SANITIZE_STRING);

if($data[3] == 'no'){
	echo '<p style="color: red" class="clear">Sutikite su vartotojo sutarties sąlygomis</p>';
		exit();
}

if($data[4] == 'spam'){
	echo '<p style="color: red" class="clear">spam</p>';	
	@mail('kaunas16@gmail.com', 'Письмо от бота', 'spam');
	$data = '';
	exit();
}
	
	
	$email = trim($data[1]);  // email отправителя
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
  	if ( filter_var($email, FILTER_VALIDATE_EMAIL) === false) {   			 
   			 echo '<p style="color: red" class="clear">Neteisingas el. pašto formatas</p>';
   			 exit();
  	}
  	

	$message = "От: ".$name."\r\n".trim($data[2]); // текст сообщения
	$message = filter_var($message, FILTER_SANITIZE_STRING);

	$to = 'taisykla@taisykla.top'; // адрес получателя 
	$subject = 'Письмо от клиента'; // тема письма
	$subject_from = 'Gavau Jūsų laišką'; // тема письма для автоответа
	$mail_from = 'taisykla@taisykla.top'; //указать доменную почту чтобы не попадать в спам 
	
	$headers = 'From: '. $mail_from . "\r\n"; // от кого указать доменную почту чтобы не попадать в спам 

	//Автоответ
$automess = "Gavome jūsų žinutė ir netrukus susisieksime.";

// кодируем заголовок в UTF-8
$subject = preg_replace("/(\r\n)|(\r)|(\n)/", "", $subject);
$subject = preg_replace("/(\t)/", " ", $subject);
$subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

global $send;
	$send = @mail($to, $subject, $message, $headers);

	echo '<p style="color: green" class="clear">Žinutė išsiųsta</p>';

	// отправка автоответ
@mail($email, $subject_from, $automess, $headers);

unset($data);



}else{
	if($data[0] ==''){
		echo '<p style="color: red" class="clear">"Jūsų vardas" negali būti tuščias</p>';
		exit();
	}
	if($data[1] ==''){
		echo '<p style="color: red" class="clear">"Email" negali būti tuščias</p>';
		exit();
	}
	echo '<p style="color: red" class="clear">Pranešimas neišsiųstas</p>';
	
}

?>