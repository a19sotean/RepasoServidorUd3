<?php
require('../view/require/header_view.php');

?>   
<div id="editForm">
    <?php
    ?>
    <form action="" method="post">
        <div class="container">
        <h2>Edita el marcador</h2>
            <hr>
            <?php
    foreach ($data[0] as $key => $value) {
        ?>
        <label><b>Url</b></label>
        <input type="url" name="url" value="<?php echo urldecode($value['bm_url'])?>" required>
        <label><b>Descripción</b></label>
        <textarea type="text" name="description" required><?php echo urldecode($value['descripcion'])?></textarea>
        <?php
    }
    ?>

            <div class="clearfix">
                <a href="<?php echo DIRBASEURL . '/bookmarks' ?>"><input type="button" name="btn_cancel" class="btn_cancel" value="Cancelar"></a>
                <button type="submit" name="btn_edit" class="btn_signup">Editar</button>
            </div>
        </div>
        
        <div class="container"> 
        </div>
    </form>

    
</form>
</div>     
