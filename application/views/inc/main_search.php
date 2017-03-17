
<div><img src="<?php echo base_url("assets/images/background.jpg"); ?>" alt="" class="img-responsive"/></div>
<div class="search-home">
    <div class="container">
        <form  method="post" action="search.php?go"  id="searchform"> 
            <div class="col-md-4">
                <input class="form-control" type="text" name="name" placeholder="Cauta..."> 
            </div>
            <div class="col-md-2" >
                <select class="judet form-control" id="judet" name="judet">
                     <option value="0">Alege Judetul</option>
                    <?php foreach ($this->generalCountyList as $judete) { ?>
                        <option value="<?php echo $judete['county_id']; ?>"><?php echo $judete['long']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-2" >
                <select class="oras" id ="cities" name="city">
                    <option>Alege Orasul</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="program_loc form-control" name="lv_start">
                    <option>01:00</option>
                    <option>02:00</option>
                    <option>03:00</option>
                    <option>04:00</option>
                    <option>05:00</option>
                    <option>06:00</option>
                    <option>07:00</option>
                    <option>08:00</option>
                    <option>09:00</option>
                    <option>10:00</option>
                    <option>11:00</option>
                    <option>12:00</option>
                    <option>13:00</option>
                    <option>14:00</option>
                    <option>15:00</option>
                    <option>16:00</option>
                    <option>17:00</option>
                    <option>18:00</option>
                    <option>19:00</option>
                    <option>20:00</option>
                    <option>21:00</option>
                    <option>22:00</option>
                    <option>23:00</option>
                    <option>24:00</option>
                </select>
                <select class="program_loc form-control" name="lv_end">
                    <option>01:00</option>
                    <option>02:00</option>
                    <option>03:00</option>
                    <option>04:00</option>
                    <option>05:00</option>
                    <option>06:00</option>
                    <option>07:00</option>
                    <option>08:00</option>
                    <option>09:00</option>
                    <option>10:00</option>
                    <option>11:00</option>
                    <option>12:00</option>
                    <option>13:00</option>
                    <option>14:00</option>
                    <option>15:00</option>
                    <option>16:00</option>
                    <option>17:00</option>
                    <option>18:00</option>
                    <option>19:00</option>
                    <option>20:00</option>
                    <option>21:00</option>
                    <option>22:00</option>
                    <option>23:00</option>
                    <option>24:00</option>
                </select>
                <input class="btn btn-success" type="submit" name="submit" value="Search"> 
            </div>
        </form> 
    </div>
</div>
<div class="button_cat_home">
    <div class="container">
        <a class="btn btn-default show_cat" href="#"><i class="fa fa-bars" aria-hidden="true"></i> Categorii </a>
    </div>
</div>

       
