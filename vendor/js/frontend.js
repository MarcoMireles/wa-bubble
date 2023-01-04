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
   var interval = 0;

   var currentDataSend = $(btnSendWhatsapp).attr('data-send');

   // Open/Close bubble
   btnWhatsapp.on('click', function(){
      btnWhatsappPopup.toggleClass('show');
      if (interval <= 0){
         hideDots();
         showContentDescription();
         interval++;
      }
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


});