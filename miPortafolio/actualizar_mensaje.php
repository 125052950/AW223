<?php
    require_once("conexion.php");

    $nombre = $_POST['txtNombre'];
    $correo = $_POST['txtCorreo'];
    $mensaje = $_POST['txtMensaje'];

    $sqlUpdate = "UPDATE mensajes SET (nombre, correo, mensaje) VALUES (?, ?, ?)";

    $stmt = $conexion->prepare($sqlUpdate);
    $stmt->bind_param("sss", $nombre, $correo, $mensaje);

    if ($stmt->execute()) {
        header("Location: editar.php?estadophp=exito");
    } else {
        header("Location: editar.php?estadophp=error");
    } 
?>