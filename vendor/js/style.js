jQuery(document).ready(function ($){


    // console.log(WA_BUBBLE_OPTIONS.bottomPosition);

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