<?php
require('../view/require/header_view.php');

?>
<h2>Mis Bookmarks</h2>
<form action="" method='get'>

    <section>
        <input class="myInput" type="text" name="inputWord" id="inputWord">
        <input class="myButton" type="submit" name="search" value="Buscar">
    </section>
</form>
<div class="table_container">
    <table>
        <tr>
            <th>Url</th>
            <th>Descripción</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>


        <?php
        if (!empty($data[1])) {
            echo "<form action=\"\" method=\"post\">";
            foreach ($data[1] as $key => $value) {
                echo '<tr>';
                echo '<td>' . $value["bm_url"] . '</td>';
                echo '<td>' . $value["descripcion"] . '</td>';
                echo '<td class="tdLink"><a href="' . DIRBASEURL . '/bookmarks/edit/' . $value['id'] . '">Editar</a></td>';
                echo '<td class="tdLink"><a href="' . DIRBASEURL . '/bookmarks/delete/' . $value['id'] . '">Eliminar</a></td>';
                echo '</tr>';
            }
        }

        ?>
    </table>

    <a href="<?php echo DIRBASEURL ?>/bookmarks/add">Añadir un Bookmark</a>

</div>
</form>