jQuery(document).ready(function ($){
   var btnExit = $('.close-popup');
   var btnWhatsapp = $('.whatsapp-icon');
   var btnWhatsappPopup = $('.whatsapp-popup-box');
   var btnSendWhatsapp = $('.popup-submit-button');
   var btnMessageWhatsapp = $('#popup-text-message');

   console.log(btnExit)
   console.log(btnWhatsapp)
   console.log(btnWhatsappPopup)


   btnWhatsapp.on('click', function(){
      btnWhatsappPopup.toggleClass('show');
   });
   btnExit.on('click', function(){
      btnWhatsappPopup.removeClass('show');
   });

   btnSendWhatsapp.on('click', function (){
      var newMessage = btnMessageWhatsapp.val();
      var currentValue = $(btnSendWhatsapp).attr('href');
      console.log(currentValue)
      $(btnSendWhatsapp).attr('href',currentValue+ newMessage );
   });


});