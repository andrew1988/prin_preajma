<div class="middle">
    <p>Editeaza informatii utilizator</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row" style="width:100%;">
                <?php 
                   
                    
                    
                    echo '<form action="#" method="post">';
                    echo '<table cellpadding="0" cellspacing="0" align="center" width="80%">'
                    . '<tr><td>Nume user:</td><td><input type="text" name="usr_username" value="'.$user_details[0]['usr_username'].'"/></td></tr>'
                    . '<tr><td>User Email</td><td><input type="text" name="usr_email" value="'.$user_details[0]['usr_email'].'"/></td></tr>'
                    . '<tr><td>Cont premium: </td><td><input type="checkbox" name="usr_premium" '.($user_details[0]['usr_premium'] == 1 ? 'checked':'').' value="1"/></td></tr>'
                    . '<tr><td>Data Inscrierii</td><td>'.$user_details[0]['usr_register_date'].'</td></tr>'
                    . '<tr><td>Data ultima logare</td><td>'.$user_details[0]['usr_last_login'].'</td></tr>'
                    . '<tr><td></td><td><input type="submit" value="Modifica"></div></td></tr>'
                    . '</table>';
                    echo "</form>";
                    
                ?>
    </div>  
 </div>
</div>
</div>