<?php
// Incluir los archivos necesarios y configurar la sesión si es necesario

// Cargar el inicializador de la aplicación
require_once __DIR__ . '/../includes/app.php';
// Generar el contenido del sitemap
$xml = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

// Agregar las URLs de las páginas en español al sitemap
$xml .= '
    <url>
        <loc>https://inbotscr.com/</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/nosotros</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/chatbots</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/bots_con_ia</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/marketing_conversacional</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/desarrollo_web</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/contacto</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>';

// Agregar las URLs de las páginas en inglés al sitemap
$xml .= '
    <url>
        <loc>https://inbotscr.com/en</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/us</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/chatbots_en</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/ai_bots</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/chat_marketing</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/web_development</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>
    <url>
        <loc>https://inbotscr.com/contact</loc>
        <lastmod>' . date("Y-m-d") . '</lastmod>
    </url>';

$xml .= '
</urlset>';

// Guardar el contenido en un archivo sitemap.xml
file_put_contents(__DIR__ . '/../public/sitemap2.xml', $xml);