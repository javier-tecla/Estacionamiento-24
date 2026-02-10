<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403 | Acceso Denegado</title>

    <!-- Fuente de Google: Inter (moderna y limpia) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <style>
        /* Estilos generales */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Contenedor proncipal de la tarjeta de error */
        .error-container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 450px;
            width: 90%;
            transition: transform 0.3s ease;
        }

        .error-container:hover {
            transform: translateY(-5px);
        }

        /* Estilo para el código de error grande */
        .error-code {
            font-size: 8rem;
            font-weight: 800;
            color: #dc3545; /* Rojo de Bootstrap para error/peligro */
            line-height: 1;
            margin-bottom: 5px;
        }

        /* Estilo para el titulo */
        .error-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #555;
        }

        /* Esztilo para el mensaje descriptivo */
        .error-message {
            font-size: 1rem;
            color: #777;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        /* Estilo del boton */
        .btn-home {
            display: inline-block;
            background-color: #007bff; /* Azul de Bootstrap */
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-home:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
        }
    </style>
</head>
<body>

    <div class="error-container">

        <div class="error-code">403</div>

        <h1 class="error-title">Acceso Denegado</h1>

        <p class="error-message">
            Lo sentimos, pero no tienes los permisos necesarios para acceder a esta página.
            Contacta al administrador del sitema si crees que esto es un error.
        </p>

        <a href="{{ url('/admin') }}" class="btn-home">
            Volver al Inicio
        </a>
    </div>
    
</body>
</html>