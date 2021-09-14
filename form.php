<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';   
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


$email = isset($_POST['email']) ? $_POST['email'] : null;
$subject = isset($_POST['subject']) ? $_POST['subject'] : 'Konu';
$message = isset($_POST['message']) ? $_POST['message'] : null;

if(!$email)
{
    echo "Lütfen mail adresinizi giriniz";

}elseif(!$message)
{
    echo "Lütfen mesaj alanını doldurunuz";

}
else 
{
    $mail=new PHPMailer(true);


    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ecemsikarr22@gmail.com';                     //SMTP username
        $mail->Password   = 'ecem12345';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;      
        $mail->charset = "UTF-8";
        $mail->setlanguage('tr');                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('ecemsikarr22@gmail.com', 'Ecem Sıkar');
        $mail->addAddress($email);     //Add a recipient
        $mail->addReplyTo('ecemskarr@gmail.com', 'Ecem Sıkar');
       

        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "Başarıyla gönderildi";
    }
    catch(Exception $e)
    {
        echo $e-> errormessage();
    }

}





?>