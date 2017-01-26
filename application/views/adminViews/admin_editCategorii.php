<div class="middle">
    <p>Admin Categorii</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php echo validation_errors(); ?>
             <form action="<?php echo base_url('admin_edit_categorii/'. $detaliiCategorie['cat_id']); ?>" method="post">
               <table cellpadding="0" cellspacing="0" align="center">
                   <tr>
                       <td>Numele categoriei:</td>
                       <td><input type="text" name="cat_nume" value="<?php echo $detaliiCategorie['cat_nume'] ?>"></td>
                   </tr>
                   <tr>
                       <td>Tipul categoriei:</td>
                       <td><select name="cat_type"><option value="0" <?php echo ($detaliiCategorie['cat_type'] == 0 ? 'selected' : '') ?>>Locatie</option>
                               <option value="1" <?php echo ($detaliiCategorie['cat_type'] == 1 ? 'selected' : '') ?>>Servicii</option></select></td>
                   </tr>
                   <tr>
                       <td></td>
                       <td><input type="submit" value="Salveaza" /></td>
                   </tr>
               </table>
             </form>
    </div>  
 </div>
</div>
</div>