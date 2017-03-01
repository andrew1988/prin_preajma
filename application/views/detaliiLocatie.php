<!-- new design -->
<div class="line"></div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <a href="#"><img class="detail img-responsive" src="<?php echo base_url($loc_poza_locatie) ?>" width="360" height="425"/></a>
            <div class="stars2">
<!--                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>-->
                    <img width="100" style="margin-top: -4px;" src="<?php echo base_url("assets/images/rating/".$rat_medie_valori.".png") ?>">
                    <div style='display: inline-block;margin-left: 10px;padding-top: 8px;'>Numar Voturi:<?php echo "$rat_nr_voturi" ?></div>
            </div>
            <?php $this->load->view($ratings); ?>
        </div>

        <div class="col-md-5">
            <p class="lorem"><?php echo "descriere"; //echo $p->description; ?>
            </p>
            <div class="share">
                <a href="https://www.facebook.com/dialog/feed?app_id=714628328686406&display=popup&amp;caption=[numele postuluii]&link=http://preajma.icsweb.ro&redirect_uri=http://preajma.icsweb.ro"><i class="fa fa-facebook-official fa-2x fb" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-2x tw" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-google-plus fa-2x gg" aria-hidden="true"></i></a>
            </div>
            <p class="share culoare">Share this page</p>

        </div>

        <div class="col-md-3">
            <img class="img-responsive" src="assets/images/ads.jpg" />
        </div>

    </div>

    <div class="row">
        <div class="col-md-9 paddingr0">                    
            <p class="review"><i class="fa fa-star yellow" aria-hidden="true"></i> Scrie un comentariu</p>
        </div>
        <div class="col-md-3">

        </div>
    </div>
    <div class="comments">
        <?php $this->load->view($comentarii); ?>
    </div>
<?php foreach ($comments as $comment) { ?>
        <div class="comment">
            <div class="row" id="comment_section">
                <div class="col-md-9 paddingr0">
                    <div class="data1">
                        <p class="user"><?php echo $comment['usr_username'] ?></p>
                        <p class="date"><?php echo $comment['rev_data_adaugarii'] ?></p>                
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>

            <div class="row">
                <div class="col-md-9 paddingr0">
                    <div class="data">
                        <p class="text2"><?php echo $comment['rev_comment']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
<?php } ?>
    <?php echo $link ?>
    <div class="row">
        <div class="col-md-9 paddingr0">                    
            <p class="review"><i class="fa fa-star yellow" aria-hidden="true"></i> Programul zilnic al locatiei</p>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">ziua</div>
        <div class="col-md-3">deschide</div>
        <div class="col-md-3">inchide</div>
    </div>
</div>

<!-- end new design -->