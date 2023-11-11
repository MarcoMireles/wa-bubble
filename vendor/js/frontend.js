var timesAutoOpen =  WA_BUBBLE_OPTIONS.timesAutoOpenOption;
if(!sessionStorage.getItem("interval")){
   sessionStorage.setItem("interval",timesAutoOpen.toString() )
   console.log('Se creo interval con el valor de: ' +sessionStorage.getItem("interval"));
}
jQuery(document).ready(function ($) {
   // Selección de elementos
   var waBubble = $('#wa-bubble');
   var btnExit = $('.close-popup');
   var btnWhatsapp = $('.whatsapp-icon');
   var btnWhatsappPopup = $('.whatsapp-popup-box');
   var btnSendWhatsapp = $('.popup-submit-button');
   var btnMessageWhatsapp = $('#popup-text-message');
   var animationDots = $('.animation-before');
   var contentDescription = $('.whatsapp-content-description');
   var showTheTime = $('.show-the-time');

   // Estado inicial de data-send
   var currentDataSend = $(btnSendWhatsapp).attr('data-send');

   // Evento de apertura/cierre de la burbuja
   btnWhatsapp.on('click', function () {
      btnWhatsappPopup.toggleClass('show');
      hideDots();
      showContentDescription();
   });

   // Evento de cierre de la burbuja
   btnExit.on('click', function () {
      btnWhatsappPopup.removeClass('show');
   });

   // Ocultar los puntos de animación después de un tiempo
   function hideDots() {
      setTimeout(function () {
         animationDots.css('display', 'none');
      }, 2000);
   }

   // Mostrar descripción y hora
   function showContentDescription() {
      setTimeout(function () {
         contentDescription.css('display', 'flex');
         showTime();
      }, 2100);
   }

   // Obtener la hora actual y mostrarla
   function showTime() {
      var today = new Date();
      var hours = today.getHours();
      var minutes = today.getMinutes();

      // Agregar ceros a la izquierda si es necesario
      var formattedHours = (hours < 10 ? '0' : '') + hours;
      var formattedMinutes = (minutes < 10 ? '0' : '') + minutes;

      var time = formattedHours + ":" + formattedMinutes;
      showTheTime.text(time);
   }

   // Enviar mensaje
   btnSendWhatsapp.on('click', function () {
      var newMessage = btnMessageWhatsapp.val();
      $(btnSendWhatsapp).attr('href', currentDataSend + newMessage);
   });

   // Verificar si la posición es válida
   function isValidPosition(position) {
      return position < 500 && position > 0 && position !== 20;
   }

   // Función para aplicar la posición lateral
   function applySidePosition(bubbleSide, sidePosition) {
      if (bubbleSide === 'right') {
         waBubble.css('right', sidePosition);
      } else {
         waBubble.css('left', sidePosition);
      }
   }

   // Configuración de Z-Index
   var zIndex = parseInt(WA_BUBBLE_OPTIONS.zIndex);
   if (isValidZIndex(zIndex)) {
      waBubble.css('z-index', zIndex);
   }
   // Función para verificar si Z-Index es válido
   function isValidZIndex(zIndex) {
      return zIndex !== 999999;
   }

// Manejar el evento de cambio de tamaño de la ventana
   function handleResize() {
      var buttomPosition = parseInt(WA_BUBBLE_OPTIONS.bottomPosition);
      var buttomPositionMobile = parseInt(WA_BUBBLE_OPTIONS.bottomPositionMobile);
      var sidePosition = parseInt(WA_BUBBLE_OPTIONS.sidePosition);
      var bubbleSide = String(WA_BUBBLE_OPTIONS.bubbleSide);
      var sidePositionMobile = parseInt(WA_BUBBLE_OPTIONS.sidePositionMobile);

      // Verificar si es un dispositivo móvil
      if (window.innerWidth <= 767 && isValidPosition(buttomPositionMobile)) {
         waBubble.css('bottom', buttomPositionMobile);
         // Verificar si la posición lateral para móviles es válida
         if (isValidPosition(sidePositionMobile)) {
            applySidePosition(bubbleSide, sidePositionMobile);
         }
      } else if (isValidPosition(buttomPosition)) {
         waBubble.css('bottom', buttomPosition);
         // Verificar si la posición lateral para escritorio es válida
         if (isValidPosition(sidePosition)) {
            applySidePosition(bubbleSide, sidePosition);
         }
      }
   }

   // Agregar el evento de cambio de tamaño de la ventana
   window.addEventListener('resize', handleResize);

   // Llamar a la función una vez al cargar la página para manejar el estado inicial
   handleResize();


   // Configuración de la distancia lateral
   var sidePosition = parseInt(WA_BUBBLE_OPTIONS.sidePosition);
   var bubbleSide = String(WA_BUBBLE_OPTIONS.bubbleSide);
   var sidePositionMobile = String(WA_BUBBLE_OPTIONS.sidePositionMobile);
   if (isValidPosition(sidePosition)) {
      applySidePosition(bubbleSide, sidePosition);
   }



   // Configuración de auto apertura
   var autoOpenOption = String(WA_BUBBLE_OPTIONS.autoOpenOption).toLowerCase();
   var autoOpenTimeOption = parseInt(WA_BUBBLE_OPTIONS.timeOpenOption);

   if (autoOpenOption == 'yes' && parseInt(sessionStorage.getItem("interval")) > 0) {
      setTimeout(function () {
         btnWhatsappPopup.toggleClass('show');
         hideDots();
         showContentDescription();
         var interval = parseInt(sessionStorage.getItem("interval")) - 1;
         sessionStorage.setItem("interval", interval.toString());
      }, autoOpenTimeOption);
   }
});