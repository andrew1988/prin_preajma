<div class="middle">
    <p>Administrare Locatii</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <form action="<?php echo base_url("admin_update_location"); ?>" method="post">
                    <input type="hidden" name="loc_id" value="<?php echo $loc_id ?>">
                    <table cellpadding="0" cellspacing="0" border="0" align="center" width='100%'>
                        <tr>
                            <td>Nume Locatie</td>
                            <td><input type="text" class="form-control" name="loc_pseudonim" value="<?php echo $loc_pseudonim ?>"></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Judet</td>
                            <td>
                                <select class="judet" name="judet" id="location_county" onchange="populateLocationnCities(this.value);">
                                    <option value="0">Alege Judetul</option>
                                    <?php foreach ($this->generalCountyList as $judete) { ?>
                                        <option value="<?php echo $judete['county_id']; ?>" <?php echo ($cou_id == $judete['county_id']) ? 'selected="yes"' : '' ?>><?php echo $judete['long']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Oras</td>
                            <td><select class="oras" name="city" id="location_city" >
                                    <option>Alege Orasul</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td>Adresa Locatie</td>
                            <td><textarea class="form-control" name="loc_adresa_locatie"><?php echo $loc_adresa_locatie ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Date Contact</td>
                            <td><textarea class="form-control" name="loc_contact"><?php echo $loc_contact ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Descriere Locatie</td>
                            <td><textarea class="form-control" name="loc_despre"><?php echo $loc_despre ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Poza Locatie:</td>
                            <td>
                                <?php
                                if ($loc_poza_locatie == 'uploads/0') {
                                    echo 'Locatie fara poza';
                                } else {
                                    echo '<img src="' . $loc_poza_locatie . '" width="500" />';
                                }
                                ?>
                                <br>Schimba poza:<input type="file" name="image">
                            </td>
                        </tr>
                        <tr>
                            <td>Tip Program</td>
                            <td><select name="loc_prg_type" class="form-control">
                                    <option value="0" <?php echo ($cat_type == 0 ? 'selected="yes"' : '') ?>>Pe saptamana</option>
                                    <option value="1" <?php echo ($cat_type == 1 ? 'selected="yes"' : '') ?>>Pe zi</option>
                                    <option value="2" <?php echo ($cat_type == 2 ? 'selected="yes"' : '') ?>>Non Stop</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Salveaza"></td>
                        </tr>
                    </table>
                </form>
            </div>  
        </div>
    </div>
</div>