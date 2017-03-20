<div class="container">
        <div class="wrapper">
         <?php foreach($locatii as $locatie) { ?>
            <div class="row">
                <div  class="col-sm-4"><?php echo $locatie['loc_pseudonim'] ?></div>
                <div  class="col-sm-4">Edit</div>
                <div  class="col-sm-4">Del</div>
            </div>
         <?php } ?>         
        </div>
    </div>
