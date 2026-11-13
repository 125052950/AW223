<?php
require_once("conexion.php");

$id = $_GET['id'];

$estado = 1;
    
    $sqlUpdate = "UPDATE gastos SET pagado = ? WHERE id = ?";
    $stmt = $conexion->prepare($sqlUpdate);
    $stmt->bind_param("ii", $id, $estado);

    if ($stmt->execute()) {
        header("Location: index.php?estadoActualizar=exitoActualizar");
    } 
    else {
        header("Location: index.php?estadoActualizar=errorActualizar");
    }