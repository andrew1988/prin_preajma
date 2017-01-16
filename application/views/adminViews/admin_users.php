<div class="middle">
    <p>Featured Places</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php 
                    foreach($users as $user){
                        //print("<pre>"); print_r($user); print("</pre>");
                        echo '<div>'
                        . 'Nume User:'.$user['usr_username'].'| E-mail:'.$user['usr_email'] .'[<a href="'.base_url("admin_edit_user").'/'.$user['usr_id'].'">Edit</a> | <a href="#">Delete</a>]'
                        . '</div>';
                        
                    }
                  
                   echo $link;
                    
                ?>
    </div>  
 </div>
</div>
</div>