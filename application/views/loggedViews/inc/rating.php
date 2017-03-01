<?php
if ($vote == 0) {
    echo '<p>Ai votat deja aceasta locatie</p>';
} else {
    echo '<div class = "stars">
<form name = "myform" id = "rating" action = "' . base_url('ratingManagement/' . $loc_pseudonim . '/'. $loc_id) . '" method = "post" enctype = "multipart/form-data">
<input onchange = "do_submit()" value = "5" class = "star star-5" id = "star-5" type = "radio" name = "rate_vote"/>
<label class = "star star-5" for = "star-5"></label>
<input onchange = "do_submit()" value = "4" class = "star star-4" id = "star-4" type = "radio" name = "rate_vote"/>
<label class = "star star-4" for = "star-4"></label>
<input onchange = "do_submit()" value = "3" class = "star star-3" id = "star-3" type = "radio" name = "rate_vote"/>
<label class = "star star-3" for = "star-3"></label>
<input onchange = "do_submit()" value = "2" class = "star star-2" id = "star-2" type = "radio" name = "rate_vote"/>
<label class = "star star-2" for = "star-2"></label>
<input onchange = "do_submit()" value = "1" class = "star star-1" id = "star-1" type = "radio" name = "rate_vote"/>
<label class = "star star-1" for = "star-1"></label>
</form>
</div>';
}
