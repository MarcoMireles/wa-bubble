jQuery(document).ready(function ($){

    // $.get(window.location.href, function(url) {
    //     var tab = new URL(url).searchParams.get("tab");
    // });
    var url_string = window.location.href;
    var url = new URL(url_string);
    var tab = new URL(url).searchParams.get("tab");
    console.log(tab);
    // console.log(WA_BUBBLE_OPTIONS.bottomPosition);
    var autoOpen = $('#wa_bubble_bubble_autoshow');
    var autoOpenSettings = $('.dinamyc-wa_bubble_whatsapp_open_time');
    var timesAutoOpenSettings = $('.dinamyc-wa_bubble_whatsapp_times_open');
    var showAgentName = $('#wa_bubble_bubble_dyw_name_agent');
    var theAgentName = $('.dinamyc-wa_bubble_name_to_display');
    if(autoOpen.val() == 'Yes') {
        autoOpenSettings.css('display','table-row');
        timesAutoOpenSettings.css('display','table-row');
    }
    if(showAgentName.val() == 'Yes') {
        theAgentName.css('display','table-row');
    }

    $('body').on( 'change',  autoOpen , function(e){
        e.preventDefault();

        if (tab == 'wa_functions_options')
        var result = autoOpen[0].value.toString();
        if ( result == 'Yes'){
            autoOpenSettings.css('display','table-row');
            timesAutoOpenSettings.css('display','table-row');
        }else {
            autoOpenSettings.css('display','none');
            timesAutoOpenSettings.css('display','none');
        }

    });

    $('#pages_conditions').select2();
    var selectPagesCondition = $('#pages_conditions');
    var pagesCondition = $('#wa_bubble_select_page_show_or_hide');
    selectPagesCondition.on('change', function (){
        var str = JSON.stringify($(this).val());
         pagesCondition.val(str);
    });

    $('body').on( 'change',  showAgentName , function(e){
        e.preventDefault();

        var result = showAgentName[0].value.toString();
        if ( result == 'Yes'){
            theAgentName.css('display','table-row');
        }else {
            theAgentName.css('display','none');
        }

    });

    // MARCODE
    jQuery(function($){
        var imageUrl = $('.image-url');
        var btnRemove = $('.marcode-rmv');


        // on upload button click
        $('body').on( 'click', '.marcode-upl', function(e){

            e.preventDefault();

            var button = $(this),
                custom_uploader = wp.media({
                    title: 'Insert image',
                    library : {
                        // uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
                        type : 'image'
                    },
                    button: {
                        text: 'Use this image' // button label text
                    },
                    multiple: false
                }).on('select', function() { // it also has "open" and "close" events
                    var attachment = custom_uploader.state().get('selection').first().toJSON();
                    button.html('<img height="50" width="50" src="' + attachment.url + '">');
                    imageUrl.val(attachment.url);
                    button.removeClass('button-upl');
                    btnRemove.show();

                }).open();

        });
        // on remove button click
        $('body').on('click', '.marcode-rmv', function(e){

            e.preventDefault();
            var btnUpload = $('.marcode-upl');

            var button = $(this);
            btnUpload.addClass('button-upl');
            console.log(button);
            button.next().val(''); // emptying the hidden field
            button.hide().prev().html('Upload image');
        });
    });


});