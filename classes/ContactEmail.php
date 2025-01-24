<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use League\OAuth2\Client\Provider\Google;



class ContactEmail {
    public $email;
    public $name;
    public $lastname;
    public $message;

    public function __construct($email, $name, $lastname, $message) {
        $this->email = $email;    
        $this->name = $name;    
        $this->lastname = $lastname;    
        $this->message = $message;
    }
    
    public function receive_message() {
        // Mostrar errores de PHP para depuración
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $mail = new PHPMailer(true);

        try {
            // Depuración de PHPMailer
            $mail->SMTPDebug = 3; // Nivel de depuración detallado
            $mail->Debugoutput = 'html'; // Salida de depuración en formato HTML

            // Verificación de variables de entorno
            if (empty($_ENV['EMAIL_USER']) || empty($_ENV['EMAIL_PASS']) || empty($_ENV['EMAIL_TOKEN'])) {
                throw new \Exception("Las variables de entorno no están configuradas correctamente.");
            }

            // Configuración del servidor OAuth 2.0
            $provider = new Google([
                'clientId'     => $_ENV['EMAIL_USER'], // Client ID
                'clientSecret' => $_ENV['EMAIL_PASS'], // Client Secret
            ]);

            $oauthToken = $provider->getAccessToken('refresh_token', [
                'refresh_token' => $_ENV['EMAIL_TOKEN'], // Refresh Token
            ]);

            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Configuración de OAuth 2.0 en PHPMailer
            $mail->AuthType = 'XOAUTH2';
            $mail->setOAuth(new \PHPMailer\PHPMailer\OAuth([
                'provider'      => $provider,
                'clientId'      => $_ENV['EMAIL_USER'],
                'clientSecret'  => $_ENV['EMAIL_PASS'],
                'refreshToken'  => $_ENV['EMAIL_TOKEN'],
                'userName'      => 'info@inbotscr.com',
            ]));

            // Configuración del remitente y destinatario
            $mail->setFrom('info@inbotscr.com', 'INBOTSCR.COM | DO NOT REPLY!!');
            $mail->addAddress('info@inbotscr.com', 'INBOTSCR.COM');

            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($this->email, $this->name . ' ' . $this->lastname);
            }

            $mail->Subject = 'INBOTSCR.COM - Nuevo mensaje de: ' . $this->name . ' ' . $this->lastname;

            // Contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $content = '<html>';
            $content .= "<p>Nuevo mensaje recibido desde el formulario de contacto.</p>";
            $content .= "<p><strong>Email:</strong> " . htmlspecialchars($this->email) . "<br>";
            $content .= "<strong>Nombre:</strong> " . htmlspecialchars($this->name) . "<br>";
            $content .= "<strong>Apellido:</strong> " . htmlspecialchars($this->lastname) . "</p>";
            $content .= "<p><strong>Mensaje:</strong></p>";
            $content .= "<p>" . nl2br(htmlspecialchars($this->message)) . "</p>";
            $content .= '</html>';
            $mail->Body = $content;

            // Enviar el correo
            $mail->send();
            echo 'El mensaje ha sido enviado exitosamente.';
        } catch (\Exception $e) {
            // Mostrar el error para depuración
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
}
