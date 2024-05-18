<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    public $email;
    public $name;
    public $token;

    public function __construct($email, $name, $token)
    {
        $this->email = $email;    
        $this->name = $name;    
        $this->token = $token;    
        
    }

    public function sendConfirmation() {
        $email = new PHPMailer();
        try {
            //Server settings
            $email->isSMTP();                                            //Send using SMTP
            $email->Host = $_ENV['EMAIL_HOST'];
            $email->SMTPAuth = true;
            $email->Port = $_ENV['EMAIL_PORT'];
            $email->Username = $_ENV['EMAIL_USER'];
            $email->Password = $_ENV['EMAIL_PASS'];
            $email->SMTPSecure = 'tls';
        
            $email->setFrom('info@inbotscr.com');
            $email->addAddress($this->email);
            $email->Subject = 'Confirma tu cuenta';
            //Content
            $email->isHTML(true);                                  //Set email format to HTML
            $email->CharSet = 'UTF-8';

            $content = '<html>';
            $content .= "<p>Hola <strong>" . $this->name . "</strong> has creado tu cuenta en Inbotscr, ahora solo debes confirmarla presionando el siguiente enlace</p>";
            $content .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/m-confirmar?token=" . $this->token . "'>Confirmar Cuenta</a> </p>";
            $content .= "<p> Si tu no solicitaste esta cuenta, puedes ignorar el mensaje";
            $content .= '</html>';
            $email->Body    = $content;

            $email->send();

        } catch (Exception $e) {
            echo "El Mensaje no pudo enviarse. Mailer Error: {$email->ErrorInfo}";
        }
    }

    public function sendInstructions() {
        $email = new PHPMailer();
        try {
            //Server settings
            $email->isSMTP();                                            //Send using SMTP
            $email->Host = $_ENV['EMAIL_HOST'];
            $email->SMTPAuth = true;
            $email->Port = $_ENV['EMAIL_PORT'];
            $email->Username = $_ENV['EMAIL_USER'];
            $email->Password = $_ENV['EMAIL_PASS'];
            $email->SMTPSecure = 'tls';

            //Recipients
            $email->setFrom('info@inbotscr.com');
            $email->addAddress($this->email);
            $email->Subject = 'Restablece tu password';
            //Content
            $email->isHTML(true);                                  //Set email format to HTML
            $email->CharSet = 'UTF-8';


            $content = '<html>';
            $content .= "<p>Hola <strong>" . $this->name . "</strong>, has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo</p>";
            $content .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/r-password?token=" . $this->token . "'>Restablecer Password</a> </p>";
            $content .= "<p> Si tu no solicitaste esta acción, puedes ignorar el mensaje";
            $content .= '</html>';
            $email->Body    = $content;

            $email->send();

        } catch (Exception $e) {
            echo "El Mensaje no pudo enviarse. Mailer Error: {$email->ErrorInfo}";
        }
    }

    public function send_email_invitation() {
        $email = new PHPMailer();
        try {
            //Server settings
            $email->isSMTP();                                            //Send using SMTP
            $email->Host = $_ENV['EMAIL_HOST'];
            $email->SMTPAuth = true;
            $email->Port = $_ENV['EMAIL_PORT'];
            $email->Username = $_ENV['EMAIL_USER'];
            $email->Password = $_ENV['EMAIL_PASS'];
            $email->SMTPSecure = 'tls';

            //Recipients
            $email->setFrom('info@inbotscr.com');
            $email->addAddress($this->email);
            $email->Subject = 'Invitación para unirse al equipo de RSL';
            //Content
            $email->isHTML(true);                                  //Set email format to HTML
            $email->CharSet = 'UTF-8';


            $content = '<html>';
            $content .= "<p>Hola, queremos informarte que <strong>" . $this->name . "</strong> te ha invitado a unirte al equipo de RSL, sigue el siguiente enlace para hacerlo</p>";
            $content .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/c-cuenta''>Aceptar Invitación</a></p>";
            $content .= "<p> Si crees que es un error, puedes ignorar el mensaje";
            $content .= '</html>';
            $email->Body    = $content;

            $email->send();

        } catch (Exception $e) {
            echo "El Mensaje no pudo enviarse. Mailer Error: {$email->ErrorInfo}";
        }
    }

}