<div class="container">
        <div class="wrap">
            <p>Salut <?php echo $this->session->userdata('usr_username') ?></p>
             <?php echo validation_errors(); ?>
            <form method="POST" action="<?php echo base_url('update_profile') ?>">
                <input class="form-control" type="text" name="nume" placeholder="numele tau" 
                       value="<?php echo $usr_nume ?>">
                <input class="form-control" type="text" name="prenume" placeholder="prenumele tau" 
                       value="<?php echo $usr_prenume ?>">
                <input class="form-control" type="text" readonly="yes" name="email" value="<?php echo $this->session->userdata('usr_email') ?>">
                <input class="form-control" type="password" name="password" placeholder="Scrie parola noua">
                <input class="form-control" type="password" name="password_check" placeholder="Verifica noua parola">
                <input type="submit" name="submit" value="Submit"/>
            </form>
        </div>
    </div>