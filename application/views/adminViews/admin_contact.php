<div class="middle">
    <p>Mesaje contact</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
          <?php foreach($messages as $message){ ?>
            <div class="row">
                <div class="col-sm-4"><strong>Subiect:</strong><?php echo $message['con_subject']; ?></div>
                <div class="col-sm-4"><a href="<?php echo base_url("admin_delete_message/".$message['con_id']); ?>">Sterge</a></div>
                <div class="col-sm-4"><a href="<?php echo base_url("admin_view_message/".$message['con_id']);?>" >Vezi Mesaj</a></div>
            </div>
          <?php }  ?>
        </div>
    </div>
</div>