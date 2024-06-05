<?php 

require 'mail/PHPMailer/src/Exception.php';
require 'mail/PHPMailer/src/PHPMailer.php';
require 'mail/PHPMailer/src/SMTP.php';
require_once 'config.php';

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailSendAll
{
    public function sendMail_all($title, $content, $addressMail)
    {
        global $error;
        $mail = new PHPMailer(true);
        $error = array();

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                              
        $mail->isSMTP(); 
        $mail->CharSet = 'utf-8';                                           //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'htkhuong2101499@student.ctuet.edu.vn';                     //SMTP username
        $mail->Password   = 'mqam ycpr ecka okvh';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('htkhuong2101499@student.ctuet.edu.vn', 'Anonymous');
        foreach ($addressMail as $email) {
			$mail->addAddress($email);
		}    

        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $title;
        $mail->Body    = $content;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        $error['success'] = 'Đã gửi thành công!';
        } catch (Exception $e) {
        $error['mail'] = 'Nội dung và tiêu đề không được bỏ trống !';
        }
    }
}
?>
