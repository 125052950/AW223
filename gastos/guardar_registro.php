<?php

require_once ("conexion.php");

$concepto = $_POST['txtConcepto'];
$monto = $_POST['txtMonto'];
$categoria = $_POST['txtCat'];

$sqlInsert = "INSERT INTO gastos (concepto, monto, categoria) VALUES (?, ?, ?)";

$stmt = $conexion->prepare($sqlInsert);
$stmt->bind_param("sss", $concepto, $monto, $categoria);

if ($stmt->execute()) {
    echo "Mensaje guardado";
    header("Location: index.php?estadophp=exito");
} else {
    echo "Error al intentar guardar el mensaje";
    header("Location: index.php?estadophp=error");
}

?>