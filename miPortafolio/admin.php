<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes Recibidos</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <!-- FontAwesome para los íconos de la interfaz -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body.admin-body {
            background-color: #f1f5f9;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Encabezado */
        .admin-header {
            background-color: #0f172a;
            color: #ffffff;
            text-align: center;
            padding: 30px 15px;
        }

        .admin-header h1 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .admin-header p {
            font-size: 0.9rem;
            color: #94a3b8;
            font-style: italic;
        }

        /* Barra de navegación */
        .admin-nav-bar {
            background-color: #ffffff;
            text-align: left;
            padding: 10px 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .admin-nav-bar a {
            color: #6b21a8;
            font-size: 1.3rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: color 0.2s, transform 0.2s;
        }

        .admin-nav-bar a:hover {
            color: #581c87;
            transform: scale(1.1);
        }

        /* Tarjeta central */
        .admin-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 30px 15px;
        }

        .admin-card {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 25px 30px;
            width: 100%;
            max-width: 750px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .admin-card h2 {
            font-size: 1.4rem;
            color: #0f172a;
            margin-bottom: 20px;
            font-weight: 700;
            text-align: left;
        }

        /* Tabla */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table th {
            background-color: #1e293b;
            color: #ffffff;
            padding: 12px 14px;
            text-align: left;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .admin-table td {
            padding: 12px 14px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
            font-size: 0.88rem;
            color: #334155;
        }

        .admin-table tbody tr:hover td {
            background-color: #f8fafc;
        }

        /* Íconos de acción */
        .action-options {
            text-align: center;
            white-space: nowrap;
        }

        .btn-action {
            color: #6b21a8;
            font-size: 1.1rem;
            margin: 0 4px;
            text-decoration: none;
            transition: color 0.2s;
        }

        .btn-action:hover {
            color: #4c1d95;
        }

        /* Pie de página */
        .admin-footer {
            background-color: #0f172a;
            color: #94a3b8;
            text-align: center;
            padding: 20px 10px;
            font-size: 0.82rem;
            margin-top: auto;
        }

        .admin-footer p {
            margin: 4px 0;
        }
    </style>

<body class="admin-body">

    <!-- Encabezado de la Zona de Administración -->
    <header class="admin-header">
        <h1>Zona Administracion</h1>
        <p>Mensajes Recibidos</p>
    </header>

    <!-- Botón de navegación al portafolio -->
    <nav class="admin-nav-bar">
        <a href="index.php" title="Regresar al Portafolio">
            <i class="fa-solid fa-house"></i>
        </a>
    </nav>

    <!-- Contenedor principal de la tabla -->
    <main class="admin-container">
        <div class="admin-card">
            <h2>Mensajes Recibidos</h2>
            
            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        require 'consulta_mensajes.php';
                        $rsMensajes = consultaMensajes();
                        while($arrMensaje = mysqli_fetch_array($rsMensajes)){
                            echo "<tr>
                                <td>".$arrMensaje['nombre']."</td>
                                <td>".$arrMensaje['correo']."</td>
                                <td>".$arrMensaje['mensaje']."</td>
                                <td>".$arrMensaje['timeStamps']."</td>
                                <td class='action-options'>
                                    <a href='editar.php?id=".$arrMensaje['ID']."' title='Editar mensaje' class='btn-action edit'>
                                        <i class='fa-regular fa-pen-to-square'></i>
                                    </a>
                                    <a href='borrar.php?id=".$arrMensaje['ID']."' title='Borrar mensaje' class='btn-action delete' onclick=\"return confirm('Estas seguro de borrar este mensaje');\">
                                        <i class='fa-regular fa-trash-can'></i>
                                    </a>
                                </td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Pie de página -->
    <footer class="admin-footer">
        <p>&copy; 2025 Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

    <script src="js/AlertUpdate.js"></script>
    <script src="js/AlertDelete.js"></script>
</body>
</html>