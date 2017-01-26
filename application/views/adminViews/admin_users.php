<div class="middle">
    <p>Administrare utilizatori</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php 
                    foreach($users as $user){
                        //print("<pre>"); print_r($user); print("</pre>");
                        echo '<table cellpadding="0" cellspacing="0" border="0" align="center" width="80%">'
                        . '<tr><td>Nume User:'.$user['usr_username'].'| E-mail:'.$user['usr_email'] .'</td><td><a href="'.base_url("admin_edit_user").'/'.$user['usr_id'].'">Edit</a> |</td>'
                        . '<td><form action="'.base_url("admin_users").'" method="post">'
                        . '<input type="hidden" name="usr_id" value="'.$user['usr_id'].'">'
                        . '<input type="hidden" name="action" value="delete"><input type="submit" value="Delete"/></form></td></tr>'
                        . '</table>';
                        
                    }
                  
                   echo $link;
                    
                ?>
    </div>  
 </div>
</div>
</div>