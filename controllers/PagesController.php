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

    public static function contacto(Router $router){

        $router->render('pages/contacto',[
            'title' => 'Contacto',
            'description' => 'Smartbots (Bots impulsados con IA) en Costa Rica, USA y Latinamérica. Contáctanos para mejorar la experiencia de tus usuarios e impulsar tu negocio.',
            'translate_link' => '/contact'
        ]);
    }

    public static function contact(Router $router){

        $router->render('pages/contact',[
            'title' => 'Contact',
            'description' => 'Smartbots (AI powered Bots) in Costa Rica, USA & Latin America. Contact us to improve your customers\'s experience while boosting your business',
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