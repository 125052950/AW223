<?php
require_once("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM mensajes WHERE ID = ?";
    $stmt = $conexion->prepare($query);
    
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: admin.php?estadoBorrar=exitoBorrar");
    } else {
        header("Location: admin.php?estadoBorrar=errorBorrar");
    }

    $stmt->close();
} else {
    header("Location: admin.php");
    exit();
}

$conexion->close();
?>