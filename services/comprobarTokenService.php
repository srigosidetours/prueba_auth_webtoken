<?php
// Incluye la biblioteca para trabajar con JWT
require '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

// Clave secreta utilizada para firmar el token (debe ser la misma que se utilizó para generar el token)
$secret_key = "tu_clave_secreta";

// Token JWT recibido desde la solicitud
$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxMjMsInVzZXJuYW1lIjoiZWplbXBsb1VzdWFyaW8iLCJleHAiOjE3MDg2MDA4MzB9.Nj5afGL1fK1QIty2Y2XQywl5QQjIiTSwaqRwkaMzcZc"; // Aquí debes colocar el token recibido

$token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyX2lkIjoxMjMsImNvc28iOjEsImNvc2l0byI6MC41LCJwYXRhdGEiOiJwYXRhdGEiLCJ4ZCI6InhkIiwidXNlcm5hbWUiOiJlamVtcGxvVXN1YXJpbyIsImV4cCI6MTcwODYwMjY5OH0.tiF2zHDta1rQCW0sn-oFnSB__EBCDh5_2k461OmXfhg";

try {
    // Decodifica y verifica el token
    $decoded = JWT::decode($token, new Key($secret_key, 'HS256'));

    // El token es válido
    // Puedes acceder a los datos del usuario contenidos en $decoded
    $user_id = $decoded->user_id;
    $username = $decoded->username;

    // Comprueba si el token ha caducado
    $current_timestamp = time();
    $expiration_timestamp = $decoded->exp;
    if ($current_timestamp > $expiration_timestamp) {
        // El token ha caducado
        echo "El token ha caducado.";
        print_r($decoded);
    } else {
        // El token es válido y no ha caducado
        echo "El token es válido y no ha caducado.";
        print_r($decoded);
        // Calcula los minutos restantes antes de que el token caduque
        $minutes_remaining = ($expiration_timestamp - $current_timestamp) / 60;

        
        echo "El token es válido y caduca en " . round($minutes_remaining) . " minutos.";

    }
} catch (Exception $e) {
    // Error al decodificar/verificar el token
    echo "Error al verificar el token: " . $e->getMessage();
}

