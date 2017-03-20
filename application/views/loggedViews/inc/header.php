<?php print("<pre>"); print_r($this->session->all_userdata()); print("</pre>") ?>
<div class="bg">
            <div class="container">
                <div class="row">
                    <!--                    <div class="col-md-1 col-sm-1">
                                            <p class="first">For more info call:<b> +044 802 52578</b> or write on email: <a class="mail" href="directory@mail.com">directory@mail.com</a></p>
                                            
                                        </div>-->
                    <div class="col-md-6 col-sm-6">
                        <div class="socials-head">
                            <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
                        </div>
                        <div class="menu-top">
                            <a href="<?php echo base_url(); ?>">Home</a> | <a href="<?php echo base_url('contact'); ?>">Contact</a></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <a class="btn btn-primary add pull-right" href="<?php echo base_url('locatie') ?>">Adauga locatie</a>
                        <ul class="nav nav-pills pull-right" style="margin-right: 10px;">

                            <p style="margin-top: 10px;">Salut <a  href="<?php echo base_url('edit_profile'); ?>"><?php echo $this->session->userdata('usr_username') ?></a> |
                                <a href="<?php echo base_url('view_locations') ?>/0">Postarile mele</a> 
                                <?php echo ($this->session->userdata('usr_rank')== 1 ? '| <a href="'.base_url('admin_home').'">Admin</a>':'') ?>  
                                | <a href="<?php echo base_url("/logout") ?>">Logout</a> </p>
                           
                            <!--<li class="btn btn-primary add"></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">    
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="logo">
                        <a href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url("assets/images/logo.png"); ?>"/></a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8">

                    <div class="reclama_header">
                        <a href="#"><img class="img-responsive" src="../timthumb.php?src=/assets/images/ad/ad_header.png&w=600&h=100"/></a>
                    </div>
                    <!--                    <div class="container-fluid">
                                             Brand and toggle get grouped for better mobile display 
                                            <div class="navbar-header">
                                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                                    <span class="sr-only">Toggle navigation</span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                    <span class="icon-bar"></span>
                                                </button>
                    
                                            </div>
                    
                                             Collect the nav links, forms, and other content for toggling 
                                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                                <ul class="nav navbar-nav ordine">
                                                    <li class="active"><a href="index.php">HOME</a></li>
                                                    <li><a href="restaurants.php">RESTAURANTE</a></li>
                                                    <li><a href="hoteluri.php">HOTELURI</a></li>
                                                    <li><a href="benzinarii.php">BENZINARII</a></li>
                                                    <li><a href="matrimoniale.php">MATRIMONIALE</a></li>
                                                    <li><a href="contact.php">CONTACT</a></li>
                                                </ul>
                                            </div> /.navbar-collapse 
                                        </div> /.container-fluid -->

                </div>
            </div>
        </div>   
     
     