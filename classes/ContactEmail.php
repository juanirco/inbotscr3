<?php

namespace Classes;

use Google\Client;
use Google\Service\Gmail;

class GmailAPI {
    private $client;

    public function __construct() {
        // Inicializa el cliente de Google
        $this->client = new Client();
        $this->client->setAuthConfig(__DIR__ . '/../credentials.json'); // Ruta al archivo JSON de credenciales
        $this->client->setAccessType('offline');
        $this->client->setScopes(['https://www.googleapis.com/auth/gmail.send']);

        // Carga o genera el token de acceso
        $tokenPath = __DIR__ . '/../token.json'; // Ruta donde se almacena el token
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $this->client->setAccessToken($accessToken);
        }

        // Si el token ha expirado, solicita uno nuevo
        if ($this->client->isAccessTokenExpired()) {
            if ($this->client->getRefreshToken()) {
                $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
            } else {
                throw new \Exception('Token de acceso expirado y no hay refresh token disponible.');
            }

            // Guardar el token actualizado
            file_put_contents($tokenPath, json_encode($this->client->getAccessToken()));
        }
    }

    public function sendEmail($to, $subject, $body, $replyTo = null) {
        $service = new Gmail($this->client);

        // Construir el mensaje
        $boundary = uniqid(rand(), true);
        $rawMessage = "Content-Type: text/html; charset=UTF-8\r\n";
        $rawMessage .= "MIME-Version: 1.0\r\n";
        $rawMessage .= "Content-Transfer-Encoding: 7bit\r\n";
        $rawMessage .= "To: <$to>\r\n";
        $rawMessage .= "From: INBOTSCR.COM <info@inbotscr.com>\r\n";
        $rawMessage .= "Subject: $subject\r\n";

        if ($replyTo) {
            $rawMessage .= "Reply-To: $replyTo\r\n";
        }

        $rawMessage .= "\r\n$body";

        // Codificar el mensaje en base64
        $rawMessage = strtr(base64_encode($rawMessage), ['+' => '-', '/' => '_']);
        $gmailMessage = new Gmail\Message();
        $gmailMessage->setRaw($rawMessage);

        // Enviar el correo
        $service->users_messages->send('me', $gmailMessage);

        return true;
    }
}
