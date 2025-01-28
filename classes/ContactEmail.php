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
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0; // Cambiar a 3 para depuración
            $mail->Debugoutput = 'html';

            // Validar variables de entorno
            if (empty($_ENV['EMAIL_USER']) || empty($_ENV['EMAIL_PASS']) || empty($_ENV['EMAIL_TOKEN'])) {
                throw new \Exception("Variables de entorno no configuradas correctamente.");
            }

            // Configuración de OAuth 2.0
            $provider = new Google([
                'clientId'     => $_ENV['EMAIL_USER'],
                'clientSecret' => $_ENV['EMAIL_PASS'],
            ]);

            $oauthToken = $provider->getAccessToken('refresh_token', [
                'refresh_token' => $_ENV['EMAIL_TOKEN'],
            ]);

            // Configuración de PHPMailer con OAuth 2.0
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->AuthType = 'XOAUTH2';
            $mail->setOAuth(new \PHPMailer\PHPMailer\OAuth([
                'provider'      => $provider,
                'clientId'      => $_ENV['EMAIL_USER'],
                'clientSecret'  => $_ENV['EMAIL_PASS'],
                'refreshToken'  => $_ENV['EMAIL_TOKEN'],
                'userName'      => 'info@inbotscr.com',
            ]));

            // El correo se enviará desde info@inbotscr.com
            $mail->setFrom('info@inbotscr.com', 'INBOTSCR.COM | Formulario de Contacto');

            // Configurar destinatario (tú recibirás este correo)
            $mail->addAddress('info@inbotscr.com', 'INBOTSCR.COM');

            // Añadir Reply-To con el correo del visitante
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($this->email, $this->name . ' ' . $this->lastname);
            }

            // Configurar asunto y contenido
            $mail->Subject = 'Nuevo mensaje de: ' . $this->name . ' ' . $this->lastname;
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

            // Enviar correo
            $mail->send();
            echo 'El mensaje ha sido enviado exitosamente.';
        } catch (\Exception $e) {
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }

    public function automatic_response() {
        $our_number = "+506 83189598";
        $our_address = "Alajuela, Costa Rica";
        $mail = new PHPMailer(true);
    
        try {
            // Configuración del servidor OAuth 2.0
            $provider = new Google([
                'clientId'     => $_ENV['EMAIL_USER'], // Reemplaza con tu Client ID
                'clientSecret' => $_ENV['EMAIL_PASS'], // Reemplaza con tu Client Secret
            ]);

            $oauthToken = $provider->getAccessToken('refresh_token', [
                'refresh_token' => $_ENV['EMAIL_TOKEN'] // Reemplaza con tu Refresh Token
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
                'clientId'      => $_ENV['EMAIL_USER'], // Reemplaza con tu Client ID
                'clientSecret'  => $_ENV['EMAIL_PASS'], // Reemplaza con tu Client Secret
                'refreshToken'  => $_ENV['EMAIL_TOKEN'], // Reemplaza con tu Refresh Token
                'userName'      => 'info@inbotscr.com', // Tu dirección de correo
            ]));
    
            // Configuración del remitente y destinatario
            $mail->setFrom('info@inbotscr.com', 'INBOTSCR.COM');
            $mail->addAddress($this->email); // Enviar al correo del usuario
            $mail->Subject = 'Recibimos tu mensaje';
    
            // Contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
    
            $content = '<html>';
            $content .= "<p>Hola <strong>" . $this->name . "</strong>, gracias por comunicarte con nosotros. Hemos recibido tu mensaje y muy pronto nos estaremos comunicando contigo al email que nos brindaste.</p>";
            $content .= "<p>Si tú no solicitaste que nos comunicáramos contigo o crees que esto puede ser un error, puedes indicárnoslo a este mismo correo para evitar futuras interacciones de nuestra parte.</p>";
            $content .= "<p><br></p>";
            $content .= "<p>Saludos cordiales,";
            $content .= "<p>Equipo de Inbotscr. <br>";
            $content .= "Teléfono: " . $our_number . "<br>";
            $content .= "Dirección: " . $our_address . "</p>";
            $content .= '</html>';
            $mail->Body = $content;
    
            // Enviar el correo
            $mail->send();
    
        } catch (Exception $e) {
            echo "El Mensaje no pudo enviarse. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    
    public function automatic_response_en() {
        $our_number = "+506 83189598";
        $our_address = "Alajuela, Costa Rica";
        $mail = new PHPMailer(true);
    
        try {
            // Configuración del servidor OAuth 2.0
            $provider = new Google([
                'clientId'     => $_ENV['EMAIL_USER'], // Reemplaza con tu Client ID
                'clientSecret' => $_ENV['EMAIL_PASS'], // Reemplaza con tu Client Secret
            ]);

            $oauthToken = $provider->getAccessToken('refresh_token', [
                'refresh_token' => $_ENV['EMAIL_TOKEN'] // Reemplaza con tu Refresh Token
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
                'clientId'      => $_ENV['EMAIL_USER'], // Reemplaza con tu Client ID
                'clientSecret'  => $_ENV['EMAIL_PASS'], // Reemplaza con tu Client Secret
                'refreshToken'  => $_ENV['EMAIL_TOKEN'], // Reemplaza con tu Refresh Token
                'userName'      => 'info@inbotscr.com', // Tu dirección de correo
            ]));
    
            // Configuración del remitente y destinatario
            $mail->setFrom('info@inbotscr.com', 'INBOTSCR.COM');
            $mail->addAddress($this->email); // Enviar al correo del usuario
            $mail->Subject = 'We received your message';
    
            // Contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
    
            $content = '<html>';
            $content .= "<p>Hello <strong>" . $this->name . "</strong>, thank you for contacting us. We have received your message and will be in touch with you very soon at the email you provided.</p>";
            $content .= "<p>If you did not request us to contact you or believe this may be an error, you can let us know at this email to avoid future interactions from our part.</p>";
            $content .= "<p><br></p>";
            $content .= "<p>Best regards,";
            $content .= "<p>Inbotscr Team. <br>";
            $content .= "Phone: " . $our_number . "<br>";
            $content .= "Address: " . $our_address . "</p>";
            $content .= '</html>';
            $mail->Body = $content;
    
            // Enviar el correo
            $mail->send();
    
        } catch (Exception $e) {
            echo "The message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}    