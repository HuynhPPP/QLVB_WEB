<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';



if(isset($_POST["send"])) {
		$mail = new PHPMailer(true);
		$mail->isSMTP();                                           
		$mail->Host       = 'smtp.gmail.com';                     
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = 'htkhuong2101499@student.ctuet.edu.vn';                     
		$mail->Password   = 'mqam ycpr ecka okvh';                              
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
		$mail->Port       = 465;    
		
		$mail->setFrom('htkhuong2101499@student.ctuet.edu.vn');
		$mail->addAddress($_POST["mail"]);     
		
		$mail->isHTML(true);                                
		$mail->Subject = $_POST["tieude"];
		$mail->Body    = $_POST["noidung"];
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();

		echo
		"
		<script>
		alert('Sent succesfully');
		document.location.href = 'http://localhost/DoAn1_QLVB/page/mail';
		</script>
		";
	}
?>