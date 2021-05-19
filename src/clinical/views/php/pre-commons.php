<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clinical</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <?php
        if (isset($cssImports)) {
            foreach ($cssImports as $cssImport) {
                ?>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $cssImport?>.css" />
                <?php
            }
        }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <!-- Logo -->
    <a href="/"></a>
    <!--    <img src="/public/img/Logo.png" alt="Clinical" width="" height="">-->
    <address>Av. Corrientes 123 <small>Teléfono: 555-555-555</small></address>
    <h1>Clinical</h1>
    <?php
        if (isset($user)) {?>
        <p>Bienvenido <?php echo $user["nombre"] ?></p>
    <?php } else { ?>
        <a href="/login" class="login_anchor">Login</a>
    <?php
        }
    ?>
</header>
<main>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="institucional">Institucional</a></li>
            <li><a href="noticias">Noticias</a></li>
            <li><a href="obrasSociales">Obras sociales</a></li>
            <li><a href="profesionales">Profesionales</a></li>
            <li><a href="nuevoTurno">Sacar un turno</a></li>
            <li><a href="listaTurnos">Listados de turnos solicitados</a></li>
        </ul>
        <?php
        if (isset($user)) {?>

        <?php
        }
        ?>
    </nav>
    <!-- Agregar imagen de casita-->
    <a href="/"></a>
    <!-- Agregar parte no genérica acá abajo-->