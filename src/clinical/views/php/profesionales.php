<?php
require __DIR__ . "/pre-commons.php";

?>
    <section>
        <h2>Profesionales</h2>
        <?php
        if (isset($data)) {
            if (array_key_exists("medicos", $data)) {
                foreach ($data["medicos"] as $medico) {
                    ?>
        <section>
            <h3><?php echo $medico["apellido"] ?></h3>
            <p>Terapeuta.</p>
            <ul>
                <li><a href="/nuevoTurno.html?medico=<?php echo $medico["id"] ?>&dia=Lu">L</a></li>
                <li><a href="/nuevoTurno.html?medico=<?php echo $medico["id"] ?>&dia=Ma">M</a></li>
                <li><a href="/nuevoTurno.html?medico=<?php echo $medico["id"] ?>&dia=Mi">M</a></li>
                <li><a href="/nuevoTurno.html?medico=<?php echo $medico["id"] ?>&dia=Ju">J</a></li>
                <li><a href="/nuevoTurno.html?medico=<?php echo $medico["id"] ?>&dia=Vi">V</a></li>
                <li><a href="/nuevoTurno.html?medico=<?php echo $medico["id"] ?>&dia=Sa">S</a></li>
                <li><a href="/nuevoTurno.html?medico=<?php echo $medico["id"] ?>&dia=Do">D</a></li>
            </ul>
            <p>Horario de atención: 8:00 - 13:00</p>
            <p>Descripción</p>
            <img src="/img/Carlos.png" alt="Carlos">
            <a href="/nuevoTurno.html?medico=<?php echo $medico["id"] ?>">Pedir turno</a>
        </section>

                    <?php
                }
            }
        }
        ?>
    </section>
<?php
require __DIR__ . "/post-commons.php";