<div class="middle">
    <p>Administrare Locatii</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <table cellpadding="0" cellspacing="0" border="0" align="center" width='100%'>
                    <tr>
                        <td>Nume locatie</td>
                        <td>Nume User</td>
                        <td>Actiuni</td>
                    </tr>
                    <?php foreach ($locatii as $locatie) { ?>
                    <tr>
                        <td><?php echo $locatie['loc_pseudonim'] ?></td>
                        <td><?php echo $locatie['usr_username'] ?></td>
                        <td><a href="<?php echo base_url('admin_edit_location/'.$locatie['loc_id']) ?>">Edit</a>
                            <a href='#'>Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                 <?php echo $link; ?>
            </div>  
        </div>
    </div>
</div>