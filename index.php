<?php
//CORS

// Permite solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
// Permite que el navegador envíe cookies y encabezados de autenticación
header("Access-Control-Allow-Credentials: true");
// Permite solicitudes con los siguientes métodos HTTP
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
// Permite que los navegadores lean los encabezados especificados
header("Access-Control-Allow-Headers: Content-Type, Authorization");



// Incluye la biblioteca para trabajar con JWT
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

// Clave secreta para firmar el token
$secret_key = "tu_clave_secreta";

// Carga útil (payload) del token
$payload = array(
    "user_id" => 123,
    "coso"=>1,
    "cosito"=>0.5,
    "patata"=>'patata',
    "xd"=>'xd',
    "username" => "ejemploUsuario",
    "exp" => time() + (60 * 60) // Tiempo de expiración: 1 hora
);

// Genera el token JWT
$jwt = JWT::encode($payload, $secret_key, 'HS256');

// Prepara la respuesta JSON
$response = array(
    "status" => true,
    "message" => "Token generado exitosamente",
    "token" => $jwt
);

// Establece las cabeceras para indicar que se devuelve una respuesta JSON
header('Content-Type: application/json');

// Imprime la respuesta JSON
echo json_encode($response);
