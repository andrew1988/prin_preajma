<div class="middle">
    <p>Featured Places</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                

                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="item_home">
                            <div class="col-md-4">
                                <a href="details.php?id=" class="thumbnail">
                                    <div class="promo_label"></div>
                                    <img src="timthumb.php?src=uploads/&w=550&h=500" alt="...">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h4 class="title"><a href="details.php?id=">Some name</a></h4>
                                <h5 class="category">Restaurante</h5>
                                <p>O descriere interesanta... <a href="details.php?id=">Citeste mai mult</a></p>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i>Locatie <a href="https://www.google.ro/maps/place/locxata" target="_blank">Map</a></p>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> L-V: 9:00 AM - 12:00 PM ?></p>
                                <p>Oferta:</p>
                                <p>text oferta</p>
                            </div>
                        </div>
                    </div>
               
            </div>
        </div>

<!--        <div class="col-md-2 col-sm-0 col-xs-0">
            <div class="reclama_right">
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
            </div>
        </div>-->
    </div>  


    <div class="row">
        <div class="col-md-10">
            <div class="row">
               
                <?php foreach($locatii as $locatie){ ?>
                    <div class="col-md-12 col-sm-6 col-xs-12">
                        <div class="item_home">
                            <div class="col-md-4">
                                <a href="details.php?id=" class="thumbnail">
                                    <!--<div class="promo_label"></div>-->
                                    <img src="timthumb.php?src=uploads/imagine&w=550&h=500" alt="...">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <h4 class="title"><a href="details.php?id="><?php echo $locatie['loc_pseudonim'] ?></a></h4>
                                <h5 class="category">Restaurante</h5>
                                <p>O descriere ... <a href="details.php?id=">Citeste mai mult</a></p>
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i>  <a href="https://www.google.ro/maps/place/" target="_blank">Map</a></p>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> L-V: 9:00 AM - 18:00PM</p>
                                <p>Oferta:</p>
                                <p>text oferta</p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
           <?php echo $link;?>
        </div>
<!--
        <div class="col-md-2 col-sm-0 col-xs-0">
            <div class="reclama_right">
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
                <br/>
                <a href="#"><img class="img-responsive" src="assets/images/ad/ad_right.jpg"/></a>
            </div>
        </div>-->
    </div>
</div>