<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use Controllers\PagesController;
use Controllers\ProjectsController;
use MVC\Router;

$router = new Router();

// Public pages
$router->get('/', [PagesController::class, 'inicio']);
$router->get('/en', [PagesController::class, 'home']);
$router->get('/nosotros', [PagesController::class, 'nosotros']);
$router->get('/us', [PagesController::class, 'us']);
$router->get('/chatbots', [PagesController::class, 'chatbots']);
$router->get('/chatbots_en', [PagesController::class, 'chatbots_en']);
$router->get('/bots_con_ia', [PagesController::class, 'bots_con_ia']);
$router->get('/ai_bots', [PagesController::class, 'ai_bots']);
$router->get('/marketing_conversacional', [PagesController::class, 'marketing_conversacional']);
$router->get('/chat_marketing', [PagesController::class, 'chat_marketing']);
$router->get('/desarrollo_web', [PagesController::class, 'desarrollo_web']);
$router->get('/web_development', [PagesController::class, 'web_development']);
$router->get('/contacto', [PagesController::class, 'contacto']);
$router->get('/contact', [PagesController::class, 'contact']);
$router->post('/contacto', [PagesController::class, 'contacto']);
$router->post('/contact', [PagesController::class, 'contact']);
$router->get('/privacidad', [PagesController::class, 'privacidad']);
$router->get('/privacy', [PagesController::class, 'privacy']);
$router->get('/condiciones', [PagesController::class, 'condiciones']);
$router->get('/conditions', [PagesController::class, 'terms']);
// The way it works is route and then the function name, I mean the ones inside the quatation marks.

// Login
$router->get('/p-login', [LoginController::class, 'login']);
$router->post('/p-login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Admin
$router->get('/panel', [ProjectsController::class, 'panel']);
$router->get('/crear_proyecto', [ProjectsController::class, 'create_project']);
$router->post('/crear_proyecto', [ProjectsController::class, 'create_project']);
$router->get('/editar_proyecto', [ProjectsController::class, 'update_project']);
$router->post('/editar_proyecto', [ProjectsController::class, 'update_project']);
$router->post('/eliminar_proyecto', [ProjectsController::class, 'delete_project']);
$router->post('/eliminar_foto', [ProjectsController::class, 'delete_photo']);
$router->get('/equipo', [ProjectsController::class, 'members']);
$router->post('/equipo', [ProjectsController::class, 'members']);
$router->post('/eliminar_miembro', [ProjectsController::class, 'delete_member']);
$router->get('/perfil', [ProjectsController::class, 'profile']);
$router->post('/perfil', [ProjectsController::class, 'profile']);
$router->get('/cambiar_password', [ProjectsController::class, 'change_password']);
$router->post('/cambiar_password', [ProjectsController::class, 'change_password']);

// Crear Cuenta
$router->get('/c-cuenta', [LoginController::class, 'create']);
$router->post('/c-cuenta', [LoginController::class, 'create']);

// Formulario de Olvide mi Password
$router->get('/o-password', [LoginController::class, 'forgot']);
$router->post('/o-password', [LoginController::class, 'forgot']);

// Colocar nuevo Password
$router->get('/r-password', [LoginController::class, 'reset']);
$router->post('/r-password', [LoginController::class, 'reset']);

// Confirmación de cuenta
$router->get('/m-email', [LoginController::class, 'message']);
$router->get('/m-confirmar', [LoginController::class, 'confirm']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->routesVerify();