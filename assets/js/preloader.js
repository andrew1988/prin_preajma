//Pt centrarea preloader ului
var Page = new Object();
Page.width;
Page.height;
Page.top;
Page.getPageCenterX = function ()
{
		var fWidth;
		var fHeight;		
		//For old IE browsers 
		if(document.all) 
		{ 
		fWidth  = document.body.clientWidth; 
		fHeight = document.body.clientHeight; 
		} 
		//For DOM1 browsers 
		else if(document.getElementById &&!document.all)
		{ 
 		fWidth = innerWidth; 
		fHeight = innerHeight; 
		} 
		else if(document.getElementById) 
		{ 
		fWidth = innerWidth; 
		fHeight = innerHeight; 		
		} 
		//For Opera 
		else if (is.op) 
		{ 
		fWidth = innerWidth; 
		fHeight = innerHeight; 		
		} 
		//For old Netscape 
		else if (document.layers) 
		{ 
		fWidth = window.innerWidth; 
		fHeight = window.innerHeight; 		
		}
	
		 
		 
	Page.width = fWidth;
	Page.height = fHeight;
	Page.top = window.document.body.scrollTop;
}
jQuery().ajaxStart(showPreloader);
jQuery().ajaxStop(hidePreloader);

function showPreloader(){
	Page.getPageCenterX();
	$('#loading').show(); 
	$('#loading').css('top' ,(Page.top + Page.height/2)-100);
	$('#loading').css('left',Page.width/2-75);	
	$('#loading').css('position','absolute');	
}
function hidePreloader(){
     $('#loading').hide();
}
