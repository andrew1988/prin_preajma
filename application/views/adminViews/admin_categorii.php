<div class="middle">
    <p>Admin Categorii</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php echo validation_errors(); ?>
              <fieldset>
                  <legend>Adauga Categorie</legend>
                <form action="<?php base_url('admin_categorii') ?>" method="post">
                 <input type="hidden" name="action" value="add"/>
                <table cellpadding="5" cellspacing="5" border="0" align="center">
                    <tr>
                        <td>Categorie:<input type="text" name="cat_nume"></td><td>Tip categorie:<select name="cat_type"><option value="0">Locatii</option><option value="1">Servicii</option></select></td>
                        <td></td><td><input type="submit" value="Adauga"></td>
                    </tr>
                </table>
                </form>
              </fieldset><br><br>
              
                <?php 
                    foreach($categorii as $categorie){
                        //print("<pre>"); print_r($user); print("</pre>");
                        echo '<table cellpadding="0" cellspacing="0" border="0" align="center" width="80%">'
                        . '<tr><td>Nume categorie:'.$categorie['cat_nume'].'| Tip Categorie:'.($categorie['cat_type']==0 ? 'Locatie' : 'Servicii') .'</td><td><a href="'.base_url("admin_edit_categorii").'/'.$categorie['cat_id'].'">Edit</a> |</td>'
                        . '<td><form action="'.base_url("admin_categorii").'" method="post">'
                        . '<input type="hidden" name="cat_id" value="'.$categorie['cat_id'].'">'
                        . '<input type="hidden" name="action" value="delete"><input type="submit" value="Delete"/></form></td></tr>'
                        . '</table>';
                    }
                ?>
    </div>  
 </div>
</div>
</div>