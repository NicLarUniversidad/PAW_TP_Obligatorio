<?php
require __DIR__ . "/pre-commons.php";

?>
    <section>
        <h2>Profesional</h2>
        <?php
        if (isset($data)) {
            if (array_key_exists("medico", $data)) {
                foreach ($data["medico"] as $medico) {
                    ?>
        <section>
            <h3><?php echo $medico["apellido"] ?></h3>
            <p>Terapeuta.</p>
           
            <p>Horario de atención: 8:00 - 13:00</p>
            <p>Descripción</p>
            <img src="/img/Carlos.png" alt="Carlos">
            <a href="/nuevoTurno.html?profesional=<?php echo $medico["id"] ?>">Pedir turno</a>
        </section>

                    <?php
                }
            }
        }
        ?>
    </section>
<?php
require __DIR__ . "/post-commons.php";