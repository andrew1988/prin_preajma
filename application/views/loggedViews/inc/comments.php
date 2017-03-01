 <?php echo validation_errors(); ?>
<form method="post" action="<?php echo base_url('details/'.$loc_pseudonim.'/'.$loc_id) ?>">
    <div class="row">
        <div class="col-md-9 paddingr0">
            <div class="form-group reviews"> 
                <textarea class="form-control" name="comment" placeholder="Comment"></textarea>
            </div>
            <div class="buttonbg">
                <input type="submit" name="comments" class="button1" value="Trimite">
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</form>