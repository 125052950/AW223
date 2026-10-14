<?php

require_once ("conexion.php");

$nombre = $_POST['txtNombre'];
$correo = $_POST['txtCorreo'];
$mensaje = $_POST['txtMensaje'];

$sqlInsert = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sqlInsert);
$stmt->bind_param("sss", $nombre, $correo, $mensaje);

if ($stmt->execute()) {
    echo "Mensaje guardado";
} else {
    echo "Error al intentar guardar el mensaje";
}

?>