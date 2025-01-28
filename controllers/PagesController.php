<?php

namespace Controllers;

use Classes\ContactEmail;
use Model\User;
use MVC\Router;

class PagesController {
    //name of the function to be found in index.php

    public static function inicio(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/inicio',[
            'title' => 'Inicio',
            'description' => 'Chatbots y Desarrollo Web en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/en'
        ]);
    }
    public static function home(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/home',[
            'title' => 'Home',
            'description' => 'Chatbots & Web Development in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
            'translate_link' => '/'
        ]);
    }

    public static function nosotros(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/nosotros',[
            'title' => 'Nosotros',
            'description' => 'Chatbots y Desarrollo Web en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/us'
        ]);
    }
    public static function us(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/us',[
            'title' => 'About Us',
            'description' => 'Chatbots & Web Development in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
            'translate_link' => '/nosotros'
        ]);
    }

    public static function chatbots(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/chatbots',[
            'title' => 'Chatbots',
            'description' => 'Chatbots en Costa Rica. Contáctanos para mejorar la expe, USA y Latinaméricariencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/chatbots_en'
        ]);
    }
    public static function chatbots_en(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/chatbots_en',[
            'title' => 'Chatbots',
            'description' => 'Chatbots in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
            'translate_link' => '/chatbots'
        ]);
    }

    public static function bots_con_ia(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/botsIA',[
            'title' => 'Bots con Inteligencia Artificial',
            'description' => 'Chatbots con IA en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/ai_bots'
        ]);
    }
    public static function ai_bots(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/ai_bots',[
            'title' => 'AI Bots',
            'description' => 'AI-powered Bots in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
            'translate_link' => '/bots_con_ia'
        ]);
    }
    public static function marketing_conversacional(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/marketing_conversacional',[
            'title' => 'Marketing Conversacional',
            'description' => 'Marketing Conversacional en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/chat_marketing'
        ]);
    }
    public static function chat_marketing(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/chat_marketing',[
            'title' => 'Chat Marketing',
            'description' => 'Chat marketing in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
            'translate_link' => '/marketing_conversacional'
        ]);
    }
    public static function desarrollo_web(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/desarrollo_web',[
            'title' => 'Desarrollo Web',
            'description' => 'Desarrollo Web en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/web_development'
        ]);
    }
    public static function web_development(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/web_development',[
            'title' => 'Web Development',
            'description' => 'Web Development in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
            'translate_link' => '/desarrollo_web'
        ]);
    }


    public static function contacto(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recaptcha_secret = '6LdbDespAAAAAH-7cD3GEb2mniXqi2p4LVZ0Ul7R';
            $recaptcha_response = $_POST['g-recaptcha-response'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
            $response_keys = json_decode($response, true);
    
            if (intval($response_keys["success"]) !== 1) {
                $alerts = User::setAlert('error', 'La verificación del reCAPTCHA falló. Por favor intenta nuevamente.');
            } else {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $message = $_POST['message'];
    
                try {
                    // Inicializar GmailAPI y enviar correo
                    $gmail = new \Classes\GmailAPI();
                    $subject = "INBOTSCR.COM - Nuevo mensaje de: $name $lastname";
                    $body = "
                        <html>
                            <p>Nuevo mensaje recibido desde el formulario de contacto.</p>
                            <p><strong>Email:</strong> $email</p>
                            <p><strong>Nombre:</strong> $name</p>
                            <p><strong>Apellido:</strong> $lastname</p>
                            <p><strong>Mensaje:</strong></p>
                            <p>$message</p>
                        </html>
                    ";
    
                    $gmail->sendEmail('info@inbotscr.com', $subject, $body, $email);
    
                    // Mensaje de respuesta automática
                    $autoReplyBody = "
                        <html>
                            <p>Hola <strong>$name</strong>,</p>
                            <p>Gracias por comunicarte con nosotros. Hemos recibido tu mensaje y muy pronto estaremos en contacto.</p>
                            <p>Si no realizaste esta solicitud, por favor ignora este mensaje.</p>
                            <br>
                            <p>Saludos cordiales,</p>
                            <p>Equipo de INBOTSCR.COM</p>
                        </html>
                    ";
                    $gmail->sendEmail($email, 'Recibimos tu mensaje', $autoReplyBody);
    
                    $alerts = User::setAlert('success', 'Mensaje enviado');
                } catch (\Exception $e) {
                    $alerts = User::setAlert('error', 'No se pudo enviar el mensaje: ' . $e->getMessage());
                }
            }
        }
    
        $alerts = User::getAlerts();
        $router->render('pages/contacto', [
            'alerts' => $alerts,
            'title' => 'Contacto',
            'description' => 'Chatbots y Desarrollo Web en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/contact'
        ]);
    }
    

    public static function contact(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recaptcha_secret = '6LdbDespAAAAAH-7cD3GEb2mniXqi2p4LVZ0Ul7R';
            $recaptcha_response = $_POST['g-recaptcha-response'];
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
            $response_keys = json_decode($response, true);
    
            if (intval($response_keys["success"]) !== 1) {
                $alerts = User::setAlert('error', 'reCAPTCHA verification failed. Please try again.');
            } else {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $lastname = $_POST['lastname'];
                $message = $_POST['message'];
    
                try {
                    // Initialize GmailAPI and send email
                    $gmail = new \Classes\GmailAPI();
                    $subject = "INBOTSCR.COM - New message from: $name $lastname";
                    $body = "
                        <html>
                            <p>A new message has been received from the contact form.</p>
                            <p><strong>Email:</strong> $email</p>
                            <p><strong>Name:</strong> $name</p>
                            <p><strong>Last Name:</strong> $lastname</p>
                            <p><strong>Message:</strong></p>
                            <p>$message</p>
                        </html>
                    ";
    
                    $gmail->sendEmail('info@inbotscr.com', $subject, $body, $email);
    
                    // Auto-reply message
                    $autoReplyBody = "
                        <html>
                            <p>Hello <strong>$name</strong>,</p>
                            <p>Thank you for contacting us. We have received your message and will get back to you soon.</p>
                            <p>If you did not make this request, please ignore this message.</p>
                            <br>
                            <p>Best regards,</p>
                            <p>The INBOTSCR.COM Team</p>
                        </html>
                    ";
                    $gmail->sendEmail($email, 'We received your message', $autoReplyBody);
    
                    $alerts = User::setAlert('success', 'Message sent');
                } catch (\Exception $e) {
                    $alerts = User::setAlert('error', 'Failed to send the message: ' . $e->getMessage());
                }
            }
        }
    
        $alerts = User::getAlerts();
        $router->render('pages/contact', [
            'alerts' => $alerts,
            'title' => 'Contact',
            'description' => 'Chatbots & Web Development in Costa Rica, USA & Latin America. Contact us to improve your customers\' experience while boosting your business.',
            'translate_link' => '/contacto'
        ]);
    }
    
    public static function privacidad(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/privacidad',[
            'title' => 'Politicas de Privacidad',
            'description' => 'Chatbots y Desarrollo Web en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/privacy'
        ]);
    }

    public static function privacy(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/privacy',[
            'title' => 'Privacy Policy',
            'description' => 'Chatbots & Web Development in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
            'translate_link' => '/privacidad'
        ]);
    }

    public static function condiciones(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/condiciones',[
            'title' => 'Términos y Condiciones',
            'description' => 'Chatbots y Desarrollo Web en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/terms'
        ]);
    }

    public static function terms(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/terms',[
            'title' => 'Terms & Conditions',
            'description' => 'Chatbots & Web Development in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
            'translate_link' => '/condiciones'
        ]);
    }
    
}