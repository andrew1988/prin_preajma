function selectForm(selectedLocation) {
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: base_url + '/getCategoryType',
        data: {cat_id: selectedLocation},
        /*async: false,*/
        success: function (response) {
            //alert(response.cat_type);
            $.each(response, function (i, value) {
                if (value.cat_type == 0) {
                    $("#serviceFields").hide();
                    $("#locationFields").show();
                } else {
                    $("#serviceFields").show();
                    $("#locationFields").hide();
                }

                //alert(value.cat_type);
            });
        },
        error: function (response) {
            console.log("there's an error" + response.responseText);
        }
    });

}

/*
 $(document).ready(function(){
 //atunci cand dom ul este pregatit populam primul select cu toate judetele care le avem in tabelul tbl_judete		  
 $.ajax({
 method:'GET',   
 data : 'ce=judet',
 url: "inc/judet/getData.php",          
 success: function(select)
 {
 $('select#judet').html(select);             
 }
 //error : function(mesaj){
 //	 alert('eroare'+mesaj);   	
 // }
 
 });  
 });
 // $(function() este echivalent cu $(document).ready(function() , un mod de a scrie mai putin cod
 $(function(){
 //Atunci cand utilizatorul alege un judet  Ajax ul trimite o cerere catre  script ul getData
 // cu avand ca paramentru id ul judetului selectat care este luat din valoarea optiunii judetului selectat
 // Scriptul va returna optiunele cu toate orasele din respectivul judet ales si va goli select ul cu strazi	  
 $("select#judet").change(function(){
 var judet_id = $(this).val();                 
 $.ajax({  
 method:'GET',
 data : 'ce=oras&judet_id='+judet_id,  	   	  
 url: "inc/judet/getData.php",      
 success: function(select)
 {     	   
 $('#oras').html(select);
 $('#strada').html('');
 }    
 });  	   
 });
 //Atunci cand utilizatorul alege un oras Ajax ul trimite o cerere catre  script ul getData
 // cu avand ca paramentru id ul orasului selectat iar scrip ul va popula selectul cu strazile respectivului oras	
 $("select#oras").change(function(){     
 var oras_id = $(this).val();
 $.ajax({  
 method:'GET',
 data : 'ce=strada&oras_id='+oras_id,  	   	  
 url: "inc/judet/getData.php",      
 success: function(select)
 {     
 $('#strada').html(select);     
 }    
 });
 
 });
 //Atunci cand utilizatorul modifica si strada vom afisa in div ul cu id ul rezultat Id urile judetului , orasului si respectiv strazii
 //alese de catre acesta 
 $("select#strada").change(function(){    	
 var rezultat = 'Id Judet = '+$('#judet').val()+'<br/> Id Oras ='+$('#oras').val()+'<br/> Id Strada = '+$('#strada').val();	       
 $('#rezultat').html(rezultat);	           
 });
 
 });
 
 
 */
 