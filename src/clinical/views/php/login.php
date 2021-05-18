<?php
require __DIR__ . "/pre-commons.php";

?>
        <section>
            <h3>Login</h3>
            <form method="post" action="/login">
                <label for="user">Usuario:</label>
                <input type="text" name="user" id="user">
                <label for="pass">Contraseña:</label>
                <input type="password" name="pass" id="pass">
                <button type="submit">Ingresar</button>
            </form>
        </section>
<?php
require __DIR__ . "/post-commons.php";