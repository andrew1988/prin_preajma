<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="keywords" content="keywords"/>
        <meta name="description" content="description"/>
        <title>Prin Preajma - The world of restaurants</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/style.css") ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.css"); ?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/select2.css"); ?>">
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
        <!-- <script type="text/javascript" src="<?php echo base_url("assets/js/code.js"); ?>"></script> -->
        <script type="text/javascript" src="<?php echo base_url("assets/js/preloader.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/select2.js"); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#judet').change(function(){
                    
                    var county = $( "select option:selected" ).val();
                   //alert(county);
                    
                    $.ajax({
                        type:'POST',
                        data:{cou_county:county},
                        url:'<?php echo base_url("ajax_controller/") ?>' + county,
                        success:function(){
                            console.log('id_judet:' + county);
                        }
                    });
                });
            
            });
        </script>
    </head>
 <body>