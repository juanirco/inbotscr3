<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;
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
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                      // Servidor SMTP de Gmail
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = $_ENV['EMAIL_USER'];                   // Tu dirección de Gmail/Google Workspace
            $mail->Password   = $_ENV['EMAIL_PASS'];                   // Tu contraseña de Gmail/Google Workspace o App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        // Enable TLS encryption
            $mail->Port       = 587;                                    // Puerto SMTP de Gmail

            // Configuración del remitente y destinatario
            $mail->setFrom('info@inbotscr.com', 'INBOTSCR.COM | DO NOT REPLY!!'); // Dirección de tu dominio
            $mail->addAddress('info@inbotscr.com', 'INBOTSCR.COM');            // Dirección receptora

            // Agregar Reply-To para que las respuestas vayan al usuario
            if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $mail->addReplyTo($this->email, $this->name . ' ' . $this->lastname);
            } else {
                throw new Exception('La dirección de correo proporcionada no es válida.');
            }

            // Asunto del correo
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
        } catch (Exception $e) {
            echo "El mensaje no pudo enviarse. Error: {$mail->ErrorInfo}";
        }
    }

    public function automatic_response() {
        $our_number = "+506 83189598";
        $our_address = "Alajuela, Costa Rica";
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

            //Recipients
            $email->setFrom('info@inbotscr.com');
            $email->addAddress($this->email);
            $email->Subject = 'Recibimos tu mensaje';
            //Content
            $email->isHTML(true);                                  //Set email format to HTML
            $email->CharSet = 'UTF-8';

            $content = '<html>';
            $content .= "<p>Hola <strong>" . $this->name . "</strong>, gracias por comunicarte con nosotros, hemos recibido tu mensaje y muy pronto  nos estaremos comunicando contigo al email que nos brindaste.</p>";
            $content .= "<p> Si tu no solicitaste que nos comunicaramos contigo o crees que esto puede ser un error, puedes indicarnoslo a este mismo correo para evitar futuras interacciones de nuestra parte.</p>";
            $content .= "<p><br></p>";
            $content .= "<p> Saludos cordiales,";
            $content .= "<p> Equipo de Inbotscr. <br>";
            $content .= "Teléfono: " . $our_number . "<br>";
            $content .= "Dirección: " . $our_address . "</p>";
            $content .= '</html>';
            $email->Body    = $content;

            $email->send();

        } catch (Exception $e) {
            echo "El Mensaje no pudo enviarse. Mailer Error: {$email->ErrorInfo}";
        }
    }

    public function automatic_response_en() {
        $our_number = "+506 83189598";
        $our_address = "Alajuela, Costa Rica";
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
    
            //Recipients
            $email->setFrom('info@inbotscr.com');
            $email->addAddress($this->email);
            $email->Subject = 'We received your message';
            //Content
            $email->isHTML(true);                                  //Set email format to HTML
            $email->CharSet = 'UTF-8';
    
            $content = '<html>';
            $content .= "<p>Hello <strong>" . $this->name . "</strong>, thank you for contacting us, we have received your message and we will be in touch with you very soon at the email you provided.</p>";
            $content .= "<p> If you did not request us to contact you or believe this may be an error, you can let us know at this email to avoid future interactions from our part.</p>";
            $content .= "<p><br></p>";
            $content .= "<p> Best regards,";
            $content .= "<p> Inbotscr Team. <br>";
            $content .= "Phone: " . $our_number . "<br>";
            $content .= "Address: " . $our_address . "</p>";
            $content .= '</html>';
            $email->Body    = $content;
    
            $email->send();
    
        } catch (Exception $e) {
            echo "The message could not be sent. Mailer Error: {$email->ErrorInfo}";
        }
    }
    

}