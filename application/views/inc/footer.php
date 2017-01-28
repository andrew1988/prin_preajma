<script>
    function do_submit() {
        document.forms['myform'].submit();
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        
        //////////login //////////////////////
        
        $("body").on("click",".pf", function(e){
            e.preventDefault();
           $("#pf").slideDown();
           $("#pj").slideUp();
        });
        
        $("body").on("click",".pj", function(e){
            e.preventDefault();
           $("#pj").slideDown();
           $("#pf").slideUp();
        });
        
        /////////////end login //////////////
        
        
        
        $("body").on("click", ".pf", function () {
            $("#pf").slideDown();
            $("#pj").slideUp();
            $("li#lpf").addClass("active");
            $("li#lpj").removeClass("active");
        });
        $("body").on("click", ".pj", function () {
            $("#pf").slideUp();
            $("#pj").slideDown();
            $("li#lpj").addClass("active");
            $("li#lpf").removeClass("active");
        });

//        $('select.judet').select2();
        $('select.oras').select2();
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        
        $("body").on('click',".another_city", function(){
            $(".select2").hide();
            $(".city").show();
            $(".judet").show();
        });
        
        $("body").on("click",".show_cat", function(e){
            e.preventDefault();
           $(".cat_home").slideToggle(); 
        });
    });
</script>
<div class="col-md-9 bg">
    <p class="first">&copy; 2016 Copyright <a href="http://prinpreajma.ro/">Prin Preajma. </a>All rights reserved.</p>
</div>
<div class="col-md-3 bg">
    <p class="footer">Powered by<a href="http://icsweb.ro"> ICS Web</a></p>
</div>

</body>
</html>