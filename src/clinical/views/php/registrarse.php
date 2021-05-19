<?php
require __DIR__ . "/pre-commons.php";

?>
    <section>
        <h2>Login</h2>
        <form method="post" action="/registrarse">
            <label for="username">Usuario:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            <label for="re-password">Reingresar contraseña:</label>
            <input type="password" name="re-password" id="re-password" required>
            <label for="email">Mail:</label>
            <input type="text" name="email" id="email">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido">
            <label for="cuil">CUIL:</label>
            <input type="text" name="cuil" id="cuil">
            <a href="/login">Login</a>
            <button type="submit">Registrarse</button>
        </form>
    </section>
<?php
require __DIR__ . "/post-commons.php";