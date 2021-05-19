<?php
require __DIR__ . "/pre-commons.php";

?>
        <section>
            <h2>Login</h2>
            <form method="post" action="/login">
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" required>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
                <a href="/registrarse">Registrarse</a>
                <button type="submit">Ingresar</button>
            </form>
        </section>
<?php
require __DIR__ . "/post-commons.php";