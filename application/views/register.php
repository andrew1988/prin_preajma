<div class="container">
    <div class="wrapper">
        <div class="login">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                        <?php echo validation_errors(); ?>
                    <?php if(($successFlag == 0)||(!isset($successFlag))){ 
                          echo $message;
                        ?>
                        <form method="post" action="<?php echo base_url("/register"); ?>">
                            <input class="form-control" type="text" name="username" placeholder="Username">
                            <input class="form-control" type="text" name="emailid" placeholder="Email">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            Esti persoana juridica?: Da:<input type="radio" radiogroup="pj" name="persoana_juridica" value="1">
                            Nu:<input type="radio" radiogroup="pj" name="persoana_juridica" value="0" checked="yes">
                            <input class="btn btn-success" type="submit" name="submit" value="Register">
                        </form>
                    <?php } 
                    else{  
                      echo $message;  
                      
                    }
?>
                      
                   
                </div>
            </div>
        </div>
    </div>
</div>