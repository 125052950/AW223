<?php
require_once("conexion.php");

$id = $_GET['id'];
    
    $sqlUpdate = "UPDATE gastos SET pagado = 1 WHERE id = ?";
    $stmt = $conexion->prepare($sqlUpdate);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?estadoActualizar=exitoActualizar");
    } 
    else {
        header("Location: index.php?estadoActualizar=errorActualizar");
    }