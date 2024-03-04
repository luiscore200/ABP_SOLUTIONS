<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de la ciudad</title>
    <style>
        /* Estilo personalizado para el email */
        body {
            font-family: sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }

        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 15px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<h1>Hola </h1>

<p>Te escribimos para compartir información sobre la ciudad que has guardado recientemente:</p>

<h2>Detalles de la ciudad:</h2>

<ul>
    <li>Nombre: {{ $city->name }}</li>
    <li>País: {{ $city->country }}</li>
    <li>Población: {{ $city->population }}</li>
    <li>Latitud: {{ $city->latitude }}</li>
    <li>Longitud: {{ $city->longitude }}</li>
    @if ($city->is_capital)
        <li>Capital: Sí</li>
    @else
        <li>Capital: No</li>
    @endif
</ul>

<p>Gracias por utilizar nuestro servicio. Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos.</p>

<p>Atentamente,</p>

<p>El equipo de ABP</p>
</body>
</html>