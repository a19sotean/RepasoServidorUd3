<?php
require('../view/require/header_view.php');

?>
<div id="addBmForm">

    <form action="" method="post">
        <div class="container">
            <h2>Nuevo Bookmark</h2>

            <label for="url">Url</label>
            <input type="url" value="" name="url" placeholder="Escribe una url" required><br>

            <label for="description">Descripción</label>
            <textarea type="text" name="description" placeholder="Escribe una descripción del marcador" required></textarea>

            <div class="clearfix">
                <a href="<?php echo DIRBASEURL . '/bookmarks'?>"><input type="button" name="btn_cancel" class="btn_cancel" value="Cancelar"></a>
                <button type="submit" name="btn_signup" class="btn_signup">Agregar</button>
            </div>
        </div>
        
        <div class="container"> 
        </div>
    </form>

    
</form>
</div>
