<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactEmail {
    public $email;
    public $name;
    public $lastname;
    public $message;
    public $our_number;

    public function __construct($email, $name, $lastname, $message)
    {
        $this->email = $email;    
        $this->name = $name;    
        $this->lastname = $lastname;    
        $this->message = $message;
    }
    
    public function receive_message() {
        $email = new PHPMailer();
        try {
            //Server settings
            $email->isSMTP();                                            //Send using SMTP
            $email->Host = $_ENV['EMAIL_HOST'];
            $email->SMTPAuth = true;
            $email->Port = $_ENV['EMAIL_PORT'];
            $email->Username = $_ENV['EMAIL_USER'];
            $email->Password = $_ENV['EMAIL_PASS'];
            $email->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        
            $email->setFrom('info@inbotscr.com', 'INBOTSCR.COM | DO NOT REPLY!!');
            $email->addAddress('info@inbotscr.com');
            $email->Subject = 'INBOTSCR.COM - Nuevo mensaje de: ' . $this->name . ' ' . $this->lastname;
            //Content
            $email->isHTML(true);                                  //Set email format to HTML
            $email->CharSet = 'UTF-8';

            $content = '<html>';
            $content .= "<p>Nuevo mensaje recibido desde el formulario de contacto. Recuerda no responder a este correo directamente, debes copiar o darle click en la dirección de correo de abajo";
            $content .= "<p><strong>Email:</strong> " . $this->email . "<br>";
            $content .= "<p><strong>Nombre:</strong> " . $this->name . "<br>";
            $content .= "<strong>Apellido:</strong> " . $this->lastname . "</p>";
            $content .= "<p><strong>Mensaje:</strong></p>";
            $content .= "<p>" . $this->message . "</p>";
            $content .= '</html>';
            $email->Body    = $content;

            $email->send();

        } catch (Exception $e) {
            echo "El Mensaje no pudo enviarse. Mailer Error: {$email->ErrorInfo}";
        }
    }   

}