jQuery(document).ready(function ($){
   var btnExit = $('.close-popup');
   var btnWhatsapp = $('.whatsapp-icon');
   var btnWhatsappPopup = $('.whatsapp-popup-box');
   var btnSendWhatsapp = $('.popup-submit-button');
   var btnMessageWhatsapp = $('#popup-text-message');
   var currentDataSend = $(btnSendWhatsapp).attr('data-send');

   btnWhatsapp.on('click', function(){
      btnWhatsappPopup.toggleClass('show');
   });
   btnExit.on('click', function(){
      btnWhatsappPopup.removeClass('show');
   });

   btnSendWhatsapp.on('click', function (){
      var newMessage = '';
       newMessage = btnMessageWhatsapp.val();
      $(btnSendWhatsapp).attr('href',currentDataSend );
      $(btnSendWhatsapp).attr('href',currentDataSend + newMessage );

   });

});