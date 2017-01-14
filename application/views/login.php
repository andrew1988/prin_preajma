<div class="container">
    <div class="wrapper">
        <div class="login">

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                        <h4 class="title">Autentificare</h4>
                        <?php echo validation_errors(); ?>
                        <?php echo $message; ?>
                        <form method="post" action="<?php echo base_url("/login"); ?>">
                            <input class="form-control" type="text" name="email" placeholder="Email">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            <div align="center">
                                <input class="btn btn-success btn_login" type="submit" name="submit" value="Login">
                            </div>
                        </form>
                   
                </div>
            </div>

        </div>
    </div>
</div>