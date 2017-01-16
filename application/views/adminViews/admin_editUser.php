<div class="middle">
    <p>Featured Places</p>
    <div class="separator"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <?php 
                    echo "edit user page view test";
                    print("<pre>"); print_r($user_details); print("</pre>");
                    
                    echo '<form action="#" method="post">';
                    echo '<div style="display:inline-block"> '
                    . '<div style="float:left">Nume user:</div><div style="float:right"><input type="text" name="usr_username" /></div>'
                    . '<div style="float:left">User Email</div><div style="float:right"><input type="text" name="usr_email" /></div>'
                    . '<div  style="float:left">Cont premium: </div><div style="float:right"><input type="checkbox" /></div>'
                    . '<div  style="float:left">Data Inscrierii</div><div style="float:right"></div>'
                    . '<div  style="float:left">Data ultima logare</div><div style="float:right"></div>'
                    . '</div>';
                    echo "</form>";
                    
                ?>
    </div>  
 </div>
</div>
</div>