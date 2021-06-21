<?php
require __DIR__ . "/pre-commons.php";
if (isset($data)) {
?>

    <section>
        <h2>Seleccionar médico</h2>
        <form class="selector" action="<?php echo $data["url"] ?>">
            <label> Médico
                <select name="medico_selected">
                    <option></option>
                    <?php
                        foreach ($data["medicos"] as $medico) {
                            ?>
                    <option value="<?php echo $medico["id"]?>"><?php echo $medico["apellido"]?></option>
                            <?php
                        }
                    ?>
                </select>
            </label>
            <button type="submit">Ver turnero</button>
        </form>
    </section>


<?php
}
require __DIR__ . "/post-commons.php";
