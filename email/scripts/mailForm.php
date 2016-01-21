<?php 
	header("Content-Type: text/html; charset=utf8;");
	// Подключение записимостей
	require_once 'email.class.php'; // Класс для работы с почтой

	//Инициализация переменных
	$error = false;
	if(isset($_POST['surname']) && !empty($_POST['surname'])){$surname = trim($_POST['surname']);}else{ $error .= "<p>Поле Фамилия пустое!</p>";};
	if(isset($_POST['name']) && !empty($_POST['name'])){$name = trim($_POST['name']);}
	if(isset($_POST['patronymic']) && !empty($_POST['patronymic'])){$patronymic = trim($_POST['patronymic']);}
	if(isset($_POST['phone']) && !empty($_POST['phone'])){$phone = trim($_POST['phone']);}
	if(isset($_POST['email']) && !empty($_POST['email'])){$email = trim($_POST['email']);}
	if(isset($_POST['mailAddress']) && !empty($_POST['mailAddress'])){$mailAddress = trim($_POST['mailAddress']);}
	if(isset($_POST['resAddress']) && !empty($_POST['resAddress'])){$resAddress = trim($_POST['resAddress']);}	
	if(isset($_POST['surname']) && !empty($_POST['surname'])){ $surname = trim($_POST['surname']); }
	if(isset($_POST['message']) && !empty($_POST['message'])){ $message = trim($_POST['message']); }else{ $error .= "<p>Поле Сообщение пустое!</p>";};

	if($error){
		echo $error;
	}else{
		echo $message;
	}