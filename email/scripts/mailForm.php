<?php 
	header("Content-Type: text/html; charset=utf8;");
	// Подключение записимостей
	require_once 'email.class.php'; // Класс для работы с почтой

	//Инициализация переменных
	if(isset($_POST['surname']) && !empty($_POST['surname'])){		
		$surname = trim($_POST['surname']);
	}

	 