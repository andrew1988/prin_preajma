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
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" />
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript">var base_url = '<?php echo base_url("ajax_controller") ?>';</script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/code.js"); ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url("assets/js/preloader.js"); ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url("assets/js/select2.js"); ?>"></script>
        <script type="text/javascript">

            var option = '';
            $(document).ready(function () {
                $('#judet').change(function () {
                    var county = $("select option:selected").val();
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: base_url + '/index',
                        data: {cou_county: county},
                        /*async: false,*/
                        success: function (response) {
                            $.each(response, function (i, value) {
                                option += '<option value="' + value.ors_id + '">' + value.ors_denumire + '</option>';
                            });
                            $('#cities').html(option).trigger('change');
                            option = '';
                        },
                        error: function (response) {
                            console.log("there's an error" + response.responseText);
                        }
                    });
                });
                
                
            });
            function populateLocationnCities(county) {

                /*alert(county);*/
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: base_url,
                    data: {cou_county: county},
                    /*async: false,*/
                    success: function (response) {
                        $.each(response, function (i, value) {
                            option += '<option value="' + value.ors_id + '">' + value.ors_denumire + '</option>';
                        });
                        //$('#cities').remove();
                        $('#location_city').html(option).trigger('change');
                        option = '';
                        /*console.log(response);*/
                    },
                    error: function (response) {
                        console.log("there's an error" + response.responseText);
                    }
                });
            }

            function getLocationConstant()
            {
                if (navigator.geolocation)
                {
                    navigator.geolocation.getCurrentPosition(onGeoSuccess, onGeoError);
                } else {
                    alert("Your browser or device doesn't support Geolocation");
                }
            }

            // If we have a successful location update
            function onGeoSuccess(event)
            {
                document.getElementById("Latitude").value = event.coords.latitude;
                document.getElementById("Longitude").value = event.coords.longitude;

            }

            // If something has gone wrong with the geolocation request
            function onGeoError(event)
            {
                alert("Error code " + event.code + ". " + event.message);
            }
        </script>
    </head>
    <body>