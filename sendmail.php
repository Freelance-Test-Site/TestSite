<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer;

require 'phpmailer/src/Exeption.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->Charset = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language');
$mail->IsHTML(true);

//От кого
$mail->setFrom('shturval222@gmail.com', 'проверка');
//Кому отправить
$mail->addAdress('shturval222@gmail.com','demon@332@gmail.com');
//Тема письма
$mail->=Subject = 'Проверка'

//Рука
$hand = 'Правая';
if($_post['hand'] == 'left'){
	$hand = 'Левая';
}

//Тело письма
$body = '<h1>Письмо с сайта cool dog</h1>';
if(trim(empty($_POST['name']))){
	$body.='<p><strong>Имя:</strong> ' .$_POST['name'].'</p>';
}
if(trim(empty($_POST['email']))){
	$body.='<p><strong>E-mail:</strong> ' .$_POST['email'].'</p>';
}
if(trim(empty($_POST['hand']))){
	$body.='<p><strong>Рука:</strong> ' .$_POST['Hand'].'</p>';
}
if(trim(empty($_POST['age']))){
	$body.='<p><strong>Возраст:</strong> ' .$_POST['age'].'</p>';
}

	
//Прикрепить файл
if(!empty($_FILES['image']['tmp_name'])){
	//Путь загрузки файла
	$filePath = __DIR__. "/files/". $_FILES['image']['name'];
	//Загрузка файла
	if(copy($_FILES['image']['tmp_name'], $filePath)){
		$fileAttach = $filePath;
		$body.='<p><strong>Фото в приложении</strong>';
		$mail->addAttachment($fileAttach);
	}
}

$mail->body = $body;

//Отправка
if(!$mail=>send()){
	$message = 'Ошибка'
} else{
	$messsage = 'Данные отправленны!'
}
$rsponse= ['message' => $message] ;

header('Content-type: application/json');
echo json_encode($response);
?>