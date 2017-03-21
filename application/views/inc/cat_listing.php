<div class="cat_home">
    <div class="container">
        <div class="row">
            <?php foreach ($this->listCategorii as $categorie) { ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <a href="<?php echo base_url('categorie/'.$categorie['cat_nume'].'/'.$categorie['cat_id'].'/0'); ?>">
                        <div class="button_cat"><?php echo  $categorie['cat_nume']; ?></div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>