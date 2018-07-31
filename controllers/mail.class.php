<?php 

require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail 
{   
    private $mail;

    public function __construct(){
        $this->mail = new PHPMailer(true);
        $this->config();
    }

    private function config(){
        $this->mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'user@example.com';                 // SMTP username
        $this->mail->Password = 'secret';                           // SMTP password
        $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 587;                                    // TCP port to connect to
        $this->mail->setFrom('no-reply@rentadvisor.com.co', 'Gana, Rentadvisor');
    }

    public function send( $to, $subject, $msg ){

        try{    

            $this->mail->addAddress($to);
            $this->mail->isHTML(true); 
            $this->mail->Subject = $subject;
            $this->mail->Body = $msg;
            $this->mail->send();

        }catch(Exception $e){
            echo 'Message could not be sent. Mailer Error: ', $this->mail->ErrorInfo;
        }
        
    }
}
