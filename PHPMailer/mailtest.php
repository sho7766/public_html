<?php

  include "PHPMailer.php";
  include "SMTP.php";

  $mail = new PHPMailer(true);

  $mail->IsSMTP();
  
  $name = $_POST['username']; 
  $email = $_POST['email']; 
  $phone = $_POST['tel'];
  $chkvalue = $_POST['hobby']; 
  $message = $_POST['message']; 
try {

//메일서버나 인증에관련된 내용

	$mail->Host = "smtp.naver.com";  // 메일서버 주소 

	$mail->SMTPAuth = true; // SMTP 인증을 사용함

	$mail->Port = 465; 	// email 보낼때 사용할 포트를 지정

	$mail->SMTPSecure = "ssl";  // SSL을 사용함

	$mail->Username = "sho7766";  // 계정  [ ??? =gmail 메일주소 @앞부분]

	$mail->Password ="godhs970509"; // 패스워드         [ ??? = gamil 계정 페스워드 ]

	$mail->CharSet = 'utf-8'; 

	$mail->Encoding = "base64";

	

	//실제 메일에 관련된내용

	$mail->From="sho7766@naver.com"; // 메일보내는사람 메일주소

	$mail->FromName= "서해온"; //보내는사람 이름

  // 받는사람메일주소 , 받는사람이름	

  $mail->AddAddress("sho7766@naver.com", "서해온"); 

	$mail->Subject = "문의내용"; // 메일 제목

	$mail->Body = "이름 : $name \r\n메일주소 : $email \r\n전화 : $phone \r\n관심분야 : $chkvalue \r\n내 용 : $message \r\n"; // 메일 내용

	$mail->Send(); // 실제로 메일을 보냄

	echo "메일을 전송하였습니다.";

} catch (phpmailerException $e) {

	echo $e->errorMessage();

} catch (Exception $e) {

	echo $e->getMessage();

}
