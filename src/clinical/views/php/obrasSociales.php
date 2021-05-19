<?php
require __DIR__ . "/pre-commons.php";

?>
    <section>
        <h2>Obras sociales</h2>
        <?php
        if (isset($data)) {
            if (array_key_exists("obras_sociales", $data)) {
                foreach ($data["obras_sociales"] as $obraSocial) {
                    ?>
                    <section>
                        <h3><?php echo $obraSocial["nombre"] ?></h3>
                        <p>Descripción, cobertura</p>
                    </section>
                    <?php
                }
            }
        }
        ?>
    </section>
<?php
require __DIR__ . "/post-commons.php";