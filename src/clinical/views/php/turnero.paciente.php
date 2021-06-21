<?php
require __DIR__ . "/pre-commons.php";
if (isset($data)) {
?>


<section>
    <h2>Turnero</h2>
    <p>Médico: <?php
                    echo $data["medico"]["apellido"] ?? "";
                    echo ", ";
                    echo $data["medico"]["nombre"] ?? "";
                     echo "Se encuentra: ";
                     echo ($data["medico"]["estado"]?? "No disponible");
                     //var_dump($data["turnoActual"]);
                     ?> </p>
    <section>
        <h3>Turno actual</h3>
        <p>Paciente: </p>
    </section>
    <section>
        <h3>Turno siguiente: </h3>
        <p>Paciente: </p>
    </section>
    <section>
        <h3>Turno de las </h3>
        <p>Paciente: </p>
    </section>
</section>

<?php
}
require __DIR__ . "/post-commons.php";
