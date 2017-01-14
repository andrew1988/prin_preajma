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
                        . 'Nume User:'.$user['usr_username'].'| E-mail:'.$user['usr_email'] .'[<a href="#">Edit</a> | <a href="#">Delete</a>]'
                        . '</div>';
                        
                    }
                    var_dump($link);
                    echo "aici ar trebui sa am paginatie". $link;
                    
                ?>
    </div>  

</div>