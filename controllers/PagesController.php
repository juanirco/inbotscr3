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
        ]);
    }
    public static function home(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/home',[
            'title' => 'Home',
        ]);
    }

    public static function nosotros(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/nosotros',[
            'title' => 'Nosotros'
        ]);
    }
    public static function us(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/us',[
            'title' => 'About Us'
        ]);
    }

    public static function chatbots(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/chatbots',[
            'title' => 'Chatbots'
        ]);
    }
    public static function chatbots_en(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/chatbots_en',[
            'title' => 'Chatbots'
        ]);
    }

    public static function bots_con_ia(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/botsIA',[
            'title' => 'Bots con Inteligencia Artificial'
        ]);
    }
    public static function ai_bots(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/ai_bots',[
            'title' => 'AI Bots'
        ]);
    }
    public static function marketing_conversacional(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/marketing_conversacional',[
            'title' => 'Marketing Conversacional'
        ]);
    }
    public static function chat_marketing(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/chat_marketing',[
            'title' => 'Chat Marketing'
        ]);
    }
    public static function desarrollo_web(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/desarrollo_web',[
            'title' => 'Desarrollo Web'
        ]);
    }
    public static function web_development(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/web_development',[
            'title' => 'Web Development'
        ]);
    }


    public static function contacto(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact_email = new ContactEmail($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['message']);
            $contact_email->receive_message();
            $contact_email->automatic_response();

            $alerts = User::setAlert('success', 'Mensaje enviado');
            header('refresh: 2.5; /contacto');
        }
        $alerts = User::getAlerts();
        $router->render('pages/contacto',[
            'title' => 'Contacto',
            'alerts' => $alerts
        ]);
    }
    public static function contact(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $contact_email = new ContactEmail($_POST['email'], $_POST['name'], $_POST['lastname'], $_POST['message']);
            $contact_email->receive_message();
            $contact_email->automatic_response_en();

            $alerts = User::setAlert('success', 'Message sent');
            header('refresh: 2.5; /contact');
        }
        $alerts = User::getAlerts();
        $router->render('pages/contact',[
            'title' => 'Contact',
            'alerts' => $alerts
        ]);
    }
    public static function privacidad(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/privacidad',[
            'title' => 'Politicas de Privacidad'
        ]);
    }

    public static function privacy(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/privacy',[
            'title' => 'Privacy Policy'
        ]);
    }

    public static function condiciones(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/condiciones',[
            'title' => 'Términos y Condiciones'
        ]);
    }

    public static function terms(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/terms',[
            'title' => 'Terms & Conditions'
        ]);
    }
    public static function sitemap_generator(Router $router){
        // place where view can be found and the code inside the brackets is what we pass to the view
        $router->render('pages/sitemap_generator');
    }
    
}