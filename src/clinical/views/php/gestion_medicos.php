<?php
require __DIR__ . "/pre-commons.php";

?>
    <section>
        <h2>Gestión médicos</h2>
        <table>
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">CUIL</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($data)) {
                        if (array_key_exists("medicos", $data)) {
                            foreach ($data["medicos"] as $medico) {
                ?>
                    <tr>
                        <th scope="col"><?php echo $medico["nombre"] ?></th>
                        <th scope="col"><?php echo $medico["apellido"] ?></th>
                        <th scope="col"><?php echo $medico["cuit"] ?></th>
                    </tr>
                <?php
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
        <form action="/gestion_medicos" method="post">
            <h3>Registrar nuevo médico</h3>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" required>
            <label for="cuil">CUIL:</label>
            <input type="text" name="cuil" id="cuil">
            <button type="submit">Registrar</button>
        </form>
    </section>
<?php
require __DIR__ . "/post-commons.php";