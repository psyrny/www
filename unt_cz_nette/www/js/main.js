
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
       

/*proklik z kontentu, ktery nema odkazovat, ale je obaleny odkazem*/
$('.stable').click(function(e) {
  e.preventDefault();
});

/*srollovani pri kliknuti na footer linky*/
//--- zarizeni
  $('#footer-link-zarizeni').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#zarizeni").offset().top - 160
   }, 500);
  });     
  
//--- instalace
  $('#footer-link-instalace').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#instalace").offset().top - 100
   }, 500);
  });       

//--- internet TV
  $('.footer-internet-tv').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#internet-tv").offset().top - 100
   }, 500);
  });      
  
//--- internet TV
  $('#footer-sledovani-tv').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#sledovani-tv").offset().top - 160
   }, 500);
  });        
        
// PRODEJ A SERVIS        
  $('#header-pas-1, #footer-pas-1').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#pas-new-vt").offset().top - 160
   }, 500);
  });  		
  
  $('#header-pas-2, #footer-pas-2').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#pas-rep-vt").offset().top - 160
   }, 500);
  });  	
  
  $('#header-pas-3, #footer-pas-3').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#pas-servis").offset().top - 160
   }, 500);
  });  	
  
  $('#header-pas-4, #footer-pas-4').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#pas-ip-kamery").offset().top - 160
   }, 500);
  });   
  
  $('#header-pas-5, #footer-pas-5').click(function(e) {
   $('html, body').animate({
	   scrollTop: $("#pas-iq-dum").offset().top - 160
   }, 500);
  });     