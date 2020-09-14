<?php
if (isset($_POST['submit'])) {
    require "phpmailer/PHPMailerAutoload.php";

    function smtpmailer($to, $from, $from_name, $subject, $body)
        {

            $message=$_POST['message'];
            $email=$_POST['email'];
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true; 
     
            $mail->SMTPSecure = 'ssl'; 
            $mail->Host = 'promotic.net';
            $mail->Port = 465;  
            $mail->Username = 'info@promotic.net';
            $mail->Password = '@123Tech#$';   
       
       //   $path = 'reseller.pdf';
       //   $mail->AddAttachment($path);
       
            $mail->IsHTML(true);
            $mail->From="info@promotic.net";
            $mail->FromName=$from_name;
            $mail->Sender=$from;
            $mail->AddReplyTo($from, $from_name);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($to);
            if(!$mail->Send())
            {
                $error ="Please try Later, Error Occured while Processing...";
                return $error; 
            }
            else 
            {
                $error = "Thanks You !! Your email is sent.";  
                header("Location: ./index.html");
                return $error;
            }
        }
        
        $to   ='info@promotic.net' ;
        $from = $email;
        $name = 'promotic';
        $subj = 'PHPMailer 5.2 testing from promotic';
        $msg = $message;
        
        $error=smtpmailer($to,$from, $name ,$subj, $msg);
}

    
?>

