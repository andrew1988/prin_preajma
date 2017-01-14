

    <div class="container">
        <div class="wrapper">
         <br>
             <form method="post" action="" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="name" placeholder="Nume restaurant">
                            <textarea class="form-control" placeholder="Descrierea ofertei" name="description"></textarea>
                            Select Image:<input type="file" name="image">
                            <?php echo $img_add; ?><br/>
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
                            <p>Judet:</p>
                            <select class="judet" name="judet">
                                <?php foreach ($jud as $judete) { ?>
                                    <option name="judet" value="<?php echo $judete->name; ?>"><?php echo $judete->name; ?></option>
                                <?php } ?>
                            </select>
                            <p>Localitate:</p>
                            <select class="oras" name="city">
                                <?php foreach ($local as $locale) { ?>
                                    <option name="city" value="<?php echo $locale->name; ?>"><?php echo $locale->name; ?></option>
                                <?php } ?>
                            </select>
                            <input class="city" type="text" name="city" placeholder="Introduceti localitatea">
                            <p>Adresa:</p>
                            <input class="form-control" type="text" name="locatie" placeholder="Adresa" value="<?php echo $address; ?>"/>
                            
                            <p>Promoveaza Restaurantul:</p>
                            <select name="premium">
                                <option value="0" name="premium">Nu</option>
                                <option value="1" name="premium">Da</option>
                            </select> 
                            <br/>
                            <div align="center">
                                <input class="btn btn-success btn_login" type="submit" name="submit" value="Adauga"/>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>
