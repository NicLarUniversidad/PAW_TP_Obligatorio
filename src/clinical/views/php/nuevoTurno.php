<?php
require __DIR__ . "/pre-commons.php";
?>
    <section>
        <h2> Sacar un turno</h2>
        <form action="/nuevoTurno" method="post" enctype="multipart/form-data">
            <fieldset>
                <legend>Identidad</legend>
                <label for="apellido">Apellido
                    <input id="apellido" name="apellido" required></label>
                <label for="nombre">Nombre
                    <input id="nombre" name="nombre" required></label>
            </fieldset>
            <fieldset>
                <legend>Datos personales</legend>
                <label for="tel">Teléfono
                    <input id="tel" name="tel" type="tel"></label>
                <label for="fecha-nac">Fecha de nacimiento
                    <input id="fecha-nac" name="fecha-nac" type="date"></label>
                <label for="edad">Edad
                    <input id="edad" name="edad" type="number" min="0"></label>
                <label for="email">Email
                    <input id="email" name="email" type="email"></label>
            </fieldset>
            <fieldset>
                <legend>Turno</legend>
                <label for="turno-medico">Médico
                    <select id="turno-medico" name="turno-medico" required>
                        <?php
                        if (isset($data)) {
                            if (array_key_exists("medicos", $data)) {
                                foreach ($data["medicos"] as $medico) {
                                    ?>
                        <option value="<?php echo $medico["id"] ?>"><?php echo $medico["apellido"] . ", " . $medico["nombre"] ?></option>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </select></label>
                <label for="fecha-turno">Fecha del turno
                    <input id="fecha-turno" name="fecha-turno" type="date" required></label>
                <label for="horario-turno">Horario del turno
                    <input id="horario-turno" name="horario-turno" type="time" required></label>
                <label for="archivo">Archivo
                    <input id="archivo" name="archivo" type="file" accept="image/png, image/jpeg" required></label>
            </fieldset>
            <button>Limpiar</button>
            <button class="success">Solicitar</button>
        </form>
        <section>
            <h3>Turnos disponibles con el Dr. Juan</h3>
            <table>
                <tr>
                    <th>L</th>
                    <th>M</th>
                    <th>M</th>
                    <th>J</th>
                    <th>V</th>
                    <th>S</th>
                    <th>D</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>13:00</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>13:30</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>15:00</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </table>
        </section>
    </section>
<?php
require __DIR__ . "/post-commons.php";
