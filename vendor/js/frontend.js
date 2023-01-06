var timesAutoOpen =  WA_BUBBLE_OPTIONS.timesAutoOpenOption;
if(!sessionStorage.getItem("interval")){
   sessionStorage.setItem("interval",timesAutoOpen.toString() )
   console.log('Se creo interval con el valor de: ' +sessionStorage.getItem("interval"));
}
jQuery(document).ready(function ($){

   // Variables
   var waBubble = $('#wa-bubble');
   var btnExit = $('.close-popup');
   var btnWhatsapp = $('.whatsapp-icon');
   var btnWhatsappPopup = $('.whatsapp-popup-box');
   var btnSendWhatsapp = $('.popup-submit-button');
   var btnMessageWhatsapp = $('#popup-text-message');
   var animationDots = $('.animation-before');
   var contentDescription = $('.whatsapp-content-description');
   var showTheTime = $('.show-the-time');

   var currentDataSend = $(btnSendWhatsapp).attr('data-send');

   // Open/Close bubble
   btnWhatsapp.on('click', function(){
      btnWhatsappPopup.toggleClass('show');
         hideDots();
         showContentDescription();
   });
   btnExit.on('click', function(){
      btnWhatsappPopup.removeClass('show');
   });

   function hideDots(){
      setTimeout(function(){
         animationDots.css('display','none');
      }, 2000);
   }
   function showContentDescription(){
      setTimeout(function(){
         contentDescription.css('display','flex');
         var today = new Date();
         var time = today.getHours() + ":" + today.getMinutes() ;
         showTheTime.text(time);
      }, 2100);

   }
   // SEnd Message
   btnSendWhatsapp.on('click', function (){
      var newMessage = '';
       newMessage = btnMessageWhatsapp.val();
      $(btnSendWhatsapp).attr('href',currentDataSend );
      $(btnSendWhatsapp).attr('href',currentDataSend + newMessage );

   });

   // Bottom distance
   var buttomPosition = parseInt(WA_BUBBLE_OPTIONS.bottomPosition);
   if (buttomPosition < 500 && buttomPosition > 0 && buttomPosition !== 20){
      waBubble.css('bottom',buttomPosition);
   }

   // Side distance
   var sidePosition = parseInt(WA_BUBBLE_OPTIONS.sidePosition);
   var bubbleSide = String(WA_BUBBLE_OPTIONS.bubbleSide);
   if (sidePosition < 500 && sidePosition > 0 && sidePosition !== 20){
      if(bubbleSide === 'right'){
         waBubble.css('right',sidePosition);
      }else{
         waBubble.css('left',sidePosition);
      }
   }

   // AUTO OPEN
   var autoOpenOption = String(WA_BUBBLE_OPTIONS.autoOpenOption).toLowerCase();
   var autoOpenTimeOption = parseInt(WA_BUBBLE_OPTIONS.timeOpenOption);
   console.log(sessionStorage.getItem("interval"))
   console.log(timesAutoOpen)

   if(autoOpenOption == 'yes' && parseInt(sessionStorage.getItem("interval")) > 0){
      setTimeout(function(){
         btnWhatsappPopup.toggleClass('show');
         hideDots();
         showContentDescription();
         var interval = parseInt(sessionStorage.getItem("interval")) - 1;
         sessionStorage.setItem("interval",interval.toString());
         } , autoOpenTimeOption);
   }
});