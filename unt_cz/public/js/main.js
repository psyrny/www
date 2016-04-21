
/*******************************************************************************
  
  UNT
  
  main js 
  
  v101-r-mq-mf-ie   
   
  Crys a Drak, 2015
  
  tested with jQ 1.8.1 

*******************************************************************************/
      
// strIsEmail ======================================================================
function strIsEmail(email) { if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/.test(email)) return true; return false; }


// strIsPhone ======================================================================
function strIsPhone(phone) { if(/^(\+420)*[67]{1}[0-9]{2}( ?)[0-9]{3}( ?)[0-9]{3}$/.test(phone)) return true; return false; }


                     
// Global variables ======================================================================
   
var isIELT9 = false,
  tOldWidth = 0
; 
          
/* ============================================================================= */               
$(window).scroll(function(e) {   
  var                      
    tst = $(this).scrollTop(),
    twh = $(window).height(); 
  
    if( (tst > 0 )  )
      $('#body_header').addClass('fixed');
    else                       
      $('#body_header').removeClass('fixed');
		 
});               
    

/* ============================================================================= */


$(document).ready(function(){
              
  var 
    deviceAgent = navigator.userAgent.toLowerCase(),
    MobileAgentID = deviceAgent.match(/(iphone|ipod|ipad|android)/);
  
  if(MobileAgentID){ 
  
  
  }
  
  $(window).scroll();
         
  
});                     
                  
/* ============================================================================= */


      
               
  //----------------------------------- mobile menu
  
  $('.button-navmobile').click( function(e) {  
    if(e) e.preventDefault?e.preventDefault():e.returnValue=false;
      $(this).parent().toggleClass('active');
    return false; 
  } );
       
       
        
        
        