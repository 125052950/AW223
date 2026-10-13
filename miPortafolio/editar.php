<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mensaje</title>
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

        /* Encabezado oscuro */
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
            margin-right: 15px;
            text-decoration: none;
            display: inline-block;
            transition: color 0.2s, transform 0.2s;
        }

        .admin-nav-bar a:hover {
            color: #581c87;
            transform: scale(1.1);
        }

        /* Tarjeta contenedora del formulario */
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
            max-width: 500px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .admin-card h2 {
            font-size: 1.4rem;
            color: #0f172a;
            margin-bottom: 20px;
            font-weight: 700;
            text-align: left;
        }

        .edit-form {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 0.88rem;
            color: #1e293b;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 0.9rem;
            font-family: inherit;
            background-color: #ffffff;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #6b21a8;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* Botón */
        .btn-submit {
            background-color: #0f172a;
            color: #ffffff;
            border: none;
            padding: 12px;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #1e293b;
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
        <p>Formulario para Editar</p>
    </header>

    <!-- Íconos de navegación -->
    <nav class="admin-nav-bar">
        <a href="admin.php" title="Regresar a Zona Administración">
            <i class="fa-solid fa-rotate-left"></i>
        </a>
        <a href="index.html" title="Regresar al Portafolio">
            <i class="fa-solid fa-house"></i>
        </a>
    </nav>

    <!-- Contenedor del Formulario -->
    <main class="admin-container">
        <div class="admin-card form-card">
            <h2>Editar Mensaje</h2>
            
            <form action="admin.php" method="POST" class="edit-form">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre de ejemplo" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="4" placeholder="Escribe tu mensaje..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">Actualizar Mensaje</button>
            </form>
        </div>
    </main>

    <!-- Pie de página -->
    <footer class="admin-footer">
        <p>&copy; 2025 Mi Portafolio</p>
        <p>Práctica de Programación Web</p>
    </footer>

</body>
</html>