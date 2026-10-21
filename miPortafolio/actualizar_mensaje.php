<?php
    require_once("conexion.php");

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $sqlUpdate = "UPDATE mensajes SET nombre = ?, correo = ?, mensaje = ? WHERE ID = ?";

    $stmt = $conexion->prepare($sqlUpdate);
    $stmt->bind_param("sssi", $nombre, $correo, $mensaje, $id);

    if ($stmt->execute()) {
        header("Location: admin.php?estadoActualizar=exitoActualizar");
    } else {
        header("Location: admin.php?id=" . $id . "&estadoActualizar=errorActualizar");
    } 

    $stmt->close();
    $conexion->close();
?>