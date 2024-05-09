<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/src/Exception.php';
require_once 'phpmailer/src/PHPMailer.php';
require_once 'phpmailer/src/SMTP.php';

$conn = mysqli_connect('localhost', 'root', '', 'da1_qlvb');

$sql = "SELECT mail FROM user"; 
$result = $conn->query($sql);

if(isset($_POST["send"])) {
    // Lấy giá trị đã chọn từ phần tử select
    $selectedEmails = $_POST['mail'];

    // Xác nhận rằng đã chọn ít nhất một địa chỉ email
    if (!empty($selectedEmails)) {
        // Lặp qua mỗi địa chỉ email đã chọn và gửi email
        foreach ($selectedEmails as $email) {
            $mail = new PHPMailer(true);
			$mail->isSMTP();                                           
			$mail->Host       = 'smtp.gmail.com';                     
			$mail->SMTPAuth   = true;                                   
			$mail->Username   = 'htkhuong2101499@student.ctuet.edu.vn';                     
			$mail->Password   = 'mqam ycpr ecka okvh';                              
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
			$mail->Port       = 465;    

			$mail->setFrom('htkhuong2101499@student.ctuet.edu.vn', 'Admin');
			$mail->addAddress($email);

			// Content
			$mail->isHTML(true);                                
			$mail->Subject = $_POST["tieude"];
			$mail->Body    = $_POST["noidung"];
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->send();
			echo "<script>
					alert('Gửi thành công !');
					document.location.href = 'http://localhost/DoAn1_QLVB/page/mail';
				</script>";   
    } 
        
    }
}

	


// if(isset($_POST["send"])) {
// 		$mail = new PHPMailer(true);
// 		$mail->isSMTP();                                           
// 		$mail->Host       = 'smtp.gmail.com';                     
// 		$mail->SMTPAuth   = true;                                   
// 		$mail->Username   = 'htkhuong2101499@student.ctuet.edu.vn';                     
// 		$mail->Password   = 'mqam ycpr ecka okvh';                              
// 		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
// 		$mail->Port       = 465;    
		
// 		$mail->setFrom('htkhuong2101499@student.ctuet.edu.vn');
// 		if ($result->num_rows > 0) {
// 			$mail->addReplyTo('htkhuong2101499@student.ctuet.edu.vn');
// 			while ($row = $result->fetch_assoc()) {	
// 				$mail->addAddress($row["mail"]);
// 			}
// 		}
		
// 		// Content
// 		$mail->isHTML(true);                                
// 		$mail->Subject = $_POST["tieude"];
// 		$mail->Body    = $_POST["noidung"];
// 		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// 		if($mail->send()) {
// 		echo "<script>
// 				alert('Gửi thành công !');
// 				document.location.href = 'http://localhost/DoAn1_QLVB/page/mail';
// 			</script>";
// 		} else {
// 		echo "<script>
// 				alert('Gửi không thành công !');
// 				document.location.href = 'http://localhost/DoAn1_QLVB/page/mail';
// 			</script>";
// 		}
// 	}
?>