<div class="middle">
    <p>Contact</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                 <form method="post" action="<?php echo base_url("send_message"); ?>">
                            <input class="form-control" type="text" name="subject" placeholder="Subiect">
                            <input class="form-control" type="text" name="mail" placeholder="e-mail">
                            <textarea class="form-control" placeholder="mesaj" name="message"></textarea>
                            <div align="center">
                                <input class="btn btn-success btn_login" type="submit" name="submit" value="Trimite mesaj">
                            </div>
                        </form>
            </div>
        </div>

    </div>
</div>
<br>