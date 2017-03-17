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
                            <td>Categorie</td>
                            <td><select name="selectCategory" id="selectCatSelect" class="form-control" onchange="selectForm(this.value)">
                                    <?php foreach ($this->listCategorii as $categorie_select) { ?>
                                        <option value="<?php echo $categorie_select['cat_id']; ?>" <?php echo ($categorie_select['cat_id'] == $cat_id ? 'selected="yes"' : '') ?>><?php echo $categorie_select['cat_nume']; ?></option>
                                    <?php } ?>
                                </select></td>
                        </tr>
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
                        <input type="radio" name="tabPick" value="tab1"> Tab 1
<input type="radio" name="tabPick" value="tab2"> Tab 2
<div id="tabs">
<div id="tab1">tab 1</div>
<div id="tab2">tab 2</div>
</div>

                        <!-- 
                         <td><div id="locationFields">
                                 <div id="tabs">
                                     <ul>
                        <!--<li><a href="#tabs-1">Program Simplu</a></li>
                        <li><a href="#tabs-2">Program Complex</a></li>
                        <li><a href="#tabs-3">Program Non stop</a></li> 
                        <li><input type="radio" id="tabs-1" name="tabs" value="0"></li>
                        <li><input type="radio" name="tabs" value="1"></li>
                        <li><input type="radio" name="tabs" value="2"></li>
                    </ul>
                    <div id="tabs-1"> 
                        <input type="hidden" name="prg_type" value="0">
                        <p>L-V:</p>
                        <div class="row">
                            <div class="col-md-6"><input class="form-control" type="text" name="lv_start" value="<?php echo $program['Luni']['deschide_la'] ?>" placeholder="Program deschidere"></div>
                            <div class="col-md-6"><input class="form-control" type="text" name="lv_end" value="<?php echo $program['Vineri']['inchide_la'] ?>" placeholder="Program inchidere"></div>
                        </div>
                        <p>S-D:</p>
                        <div class="row">
                            <div class="col-md-6"><input class="form-control" type="text" name="sd_start" value="<?php echo $program['Sambata']['deschide_la'] ?>" placeholder="Program deschidere"></div>
                            <div class="col-md-6"><input class="form-control" type="text" name="sd_end" value="<?php echo $program['Duminica']['deschide_la'] ?>" placeholder="Program inchidere"></div>
                        </div>
                    </div>
                    <div id="tabs-2">
                         <input type="hidden" name="prg_type" value="1">
                        <?php foreach ($program as $key => $prg) { ?>
                                <p><?php echo $key; ?>:</p>
                                <div class="row">
                                    <div class="col-md-6"><input class="form-control" type="text" name="<?php echo lcfirst($key); ?>_start" placeholder="Program deschidere" value = <?php echo $prg['deschide_la'] ?>></div>
                                    <div class="col-md-6"><input class="form-control" type="text" name="<?php echo lcfirst($key); ?>_end" placeholder="Program inchidere" value = <?php echo $prg['inchide_la'] ?> ></div>
                                </div>
                        <?php } ?>
                    </div>
                    <div id="tabs-3">
                        <input type="hidden" name="non_stop" value="1">
                        Programul non stop nu are setari de program.
                    </div>
                </div>
            </div></td> -->
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