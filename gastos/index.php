<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilos.css">
    <title>Gastos</title>
</head>
<body>
    
    <header>
        <h1>Control de Gastos Personales</h1>
    </header>
    <main>
        <form action="guardar_registro.php" method="post" class="form-registro">
            <h2>Registrar nuevo gasto</h2>
            <div class="registro">
                <p>Concepto:</p>
                <input type="text" name="txtConcepto" required>
                <p>Monto:</p>
                <input type="number" name="txtMonto" required>
                <p>Categoría</p>
                <select name="txtCat">
                    <option>Seleccione una opción</option>
                    <option>Comida</option>
                    <option>Transporte</option>
                    <option>Otros</option>
                </select>
                <button type="submit">Registrar gasto</button>
            </div>
        </form>
        
    </main>


    <script src="./js/AlertInsert.js"></script>
</body>
</html>