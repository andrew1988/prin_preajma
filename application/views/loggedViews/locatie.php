<div class="container">
    <div class="wrapper">
        <br>
        <form method="post" action="<?php echo base_url('locatie') ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="name" placeholder="Nume restaurant">
                    <textarea class="form-control" placeholder="Descrierea ofertei" name="description"></textarea>
                    Select Image:<input type="file" name="image">
                    <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">Program Simplu</a></li>
                            <li><a href="#tabs-2">Program Complex</a></li>
                        </ul>
                        <div id="tabs-1"> 
                            <p>L-V:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="lv_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="lv_end" placeholder="Program inchidere"></div>
                            </div>
                            <p>S-D:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="sd_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="sd_end" placeholder="Program inchidere"></div>
                            </div>
                        </div>
                        <div id="tabs-2">
                            <p>Luni:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="luni_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="luni_end" placeholder="Program inchidere"></div>
                            </div>
                            <p>Marti:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="marti_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="marti_end" placeholder="Program inchidere"></div>
                            </div>
                            <p>Miercuri:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="miercuri_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="miercuri_end" placeholder="Program inchidere"></div>
                            </div>
                            <p>Joi:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="joi_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="joi_end" placeholder="Program inchidere"></div>
                            </div>
                            <p>Vineri:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="vineri_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="vineri_end" placeholder="Program inchidere"></div>
                            </div>
                            <p>Sambata:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="sambata_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="sambata_end" placeholder="Program inchidere"></div>
                            </div>
                            <p>Duminica:</p>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="text" name="duminica_start" placeholder="Program deschidere"></div>
                                <div class="col-md-6"><input class="form-control" type="text" name="duminica_end" placeholder="Program inchidere"></div>
                            </div>
                        </div>
                    </div>
                    <p>Judet:</p>
                    <select class="judet" name="judet" id="location_county" onchange="populateLocationnCities(this.value);">
                        <option value="0">Alege Judetul</option>
                        <?php foreach ($this->generalCountyList as $judete) { ?>
                            <option value="<?php echo $judete['county_id']; ?>"><?php echo $judete['long']; ?></option>
                        <?php } ?>
                    </select>
                    <p>Localitate:</p>
                    <select class="oras" name="city" id="location_city" >
                        <option>Alege Orasul</option>
                    </select>
                    <!--<input class="city" type="text" name="city" placeholder="Introduceti localitatea" />-->
                    <p>Adresa:</p>
                    <input class="form-control" type="text" name="locatie" placeholder="Adresa" value=""/>

                   <!-- <p>Promoveaza Restaurantul:</p>
                    <select name="premium">
                        <option value="0" name="premium">Nu</option>
                        <option value="1" name="premium">Da</option>
                    </select> -->
                    <br/>
                    <div align="center">
                        <input class="btn btn-success btn_login" type="submit" name="submit" value="Adauga"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
