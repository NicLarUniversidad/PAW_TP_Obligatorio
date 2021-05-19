<?php
require __DIR__ . "/pre-commons.php";

?>
    <section>
        <?php
        if (isset($data)) {
            if (array_key_exists("fields", $data) && array_key_exists("tuples", $data)) {
                ?>
        <h2><?php echo $data["table-title"] ?></h2>
        <table>
            <thead>
                <tr>
                    <?php
                        foreach ($data["fields"] as $field) {
                            ?>
                    <th scope="col"><?php echo $field["name"] ?></th>
                            <?php
                        }
                    ?>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($data["tuples"] as $tuple) {
                    echo "                <tr>";
                    foreach ($data["fields"] as $field) {
                        ?>
                    <th scope="col"><?php echo $tuple[$field["name"]] ?></th>
                        <?php
                    }
                    echo "                </tr>";
                }
            ?>
            </tbody>
        </table>
        <form action="<?php echo $data["register-url"] ?>" method="post">
            <h3><?php echo $data["register-title"] ?></h3>
                <?php
                foreach ($data["fields"] as $field) {
                    ?>
                <label for="<?php echo $field["name"] ?>"><?php echo $field["name"] ?>:</label>
                <input type="text" name="<?php echo $field["name"] ?>" id="<?php echo $field["name"] ?>" <?php if ($field["required"]=="true") { echo "required"; } ?>>
                    <?php
                }
                ?>
            <button type="submit">Registrar</button>
        </form>
                <?php
            }
        }
        ?>
    </section>
<?php
require __DIR__ . "/post-commons.php";