<?php 

header('Content-Type: application/json; charset=utf-8');


$ar_respuesta = array(
    "error" => 1,
    "error_mensaje" => "2444000-00"
);
$json_respuesta = json_encode($ar_respuesta, JSON_UNESCAPED_UNICODE);
echo $json_respuesta;
