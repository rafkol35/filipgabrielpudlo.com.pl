<script type="text/javascript">
 // <![CDATA[

    function del_file(id,file){
         if( !confirm('Na pewno usunąć ' + file + " ?"  ) ) return false;

         var dPs = ( confirm('Usunąć wszystkie zdjęcia, które korzystają z pliku ' + file + " ?"  ) );

         $.ajax({
            url: "<?php echo site_url('panel/files/del/'); ?>",
            type: "post",
            data: {id: id,
            delPhotos: dPs==true?1:0 },
            success: function () { show_photos(); show_files(); addsortable(); },
            cache: false
        });
    }

    function addSizeable(){
        $(".filemini").mouseover(function(){
            //$(this).css('width','100px');
            //$(this).css('height','100px');
            $(this).animate({width:'70px'}, 50);
            $(this).animate({height:'70px'}, 50);
        });

        $(".filemini").mouseout(function(){
            //alert('b');
            //$(this).css('width','40px');
            //$(this).css('height','40px');
            $(this).animate({width:'40px'}, 100);
            $(this).animate({height:'40px'}, 100);
        });
    }

    function fillPhotosDiv(data){
        $("#photosList").html(data);

        addSizeable();
        
        $(".rdrop").droppable({
            drop: function(event, ui) {
                var di = $(this).attr('id').substr(3);

                if ( ui.draggable.attr('id').substr(0,2) != 'gf') return;

                $.ajax({
                    url: "<?php echo site_url('panel/photos/modify/'); ?>",
                    type: "post",
                    data: {
                        id: di,
                        what: "file_id",
                        val: ui.draggable.attr('id').substr(3)
                    },
                    success: function(data){
                        $('#gfx_'+di).attr('src', '<?php echo base_url() . 'files/images/thumbs/'; ?>' + $('#gf_file_'+ui.draggable.attr('id').substr(3)).text());
                        $('#fl_'+di).html($('#gf_file_'+ui.draggable.attr('id').substr(3)).text());
                    }
                });
            }
        });
    }

    function show_photos(){ //alert('show_photos');
        $.ajax({
            url: "<?php echo site_url('panel/photos/toHtml/'); ?>",
            type: "post",
            data: { id: <?php echo $galleryID; ?> },
            success: fillPhotosDiv,
            cache: false
        });
    }

    var prevScroll = 0;
    var prevDrag = 0;
    function show_files(){
        $.ajax({
            url: "<?php echo site_url('panel/files/toHtml'); ?>",
            type: "post",
            success: function(data){
                $("#filesList").html(data); 
                $(".rdrag2").draggable({
                    cursor: 'move',
                    opacity: 0.75,
                    revert: true,
                    revertDuration: 1,
                    stack: "#filesList",
                    start: function(event, ui)
                    {
                        if(prevDrag) prevDrag.css('background-color', '#ccaa33');
                        ui.helper.css('background-color', '#8d5');
                        prevDrag = ui.helper;
                        prevScroll = $('#filesList').scrollTop();
                        $('#filesList').css('overflow','visible');
                    },
                    stop: function(event, ui)
                    {
                        $('#filesList').css('overflow','scroll');
                        $('#filesList').scrollTop(prevScroll);
                    }
                });
                addSizeable();
            },
            error:  function(){ alert("some error"); },
            cache: false
        });
    }

    function change_gallery_slidespeed(nd){
        $.ajax({
            url: "<?php echo site_url('panel/galleries/modify'); ?>",
            type: "post",
            data: {
                id: <?php echo $galleryID; ?>,
                what: "slideSpeed",
                val: $(nd).attr('value')
            },
            cache: false
        });
    }

    function change_photo_title(nd,lng){
        $.ajax({
            url: "<?php echo site_url('panel/photos/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(7),
                what: "title_"+lng,
                val: $(nd).attr('value')
            },
            cache: false
        });
    }

    function addsortable(){ 
        $("#photosList").sortable({
            placeholder: 'ui-state-highlight',
            update : function () {
                serial = $('#photosList').sortable('serialize');
                $.ajax({
                    url: "<?php echo site_url('panel/photos/sort/'); ?>",
                    type: "post",
                    data: serial,
                    error: function(){ alert("theres an error with AJAX"); }
                });
            }
        });
    }

    function del_photo(pi){
        if( !confirm('Na pewno usunąć ?' ) ) return false;
        $.ajax({
            url: "<?php echo site_url('panel/photos/del/'); ?>",
            type: "post",
            data: {id: $(pi).attr('id').substr(3) },
            success: show_photos,
            cache: false
        });
    }

    var swfu;

    $(document).ready( function() {
        show_photos();
        show_files();
        addsortable();

        $("#panelMenu").css('width','5px');

        $("#panelMenu").mouseover( function(){
            $("#panelMenu").stop();
            $("#panelMenu").animate({width:'175px'},100);
        });
        $("#panelMenu").mouseout( function(){
            $("#panelMenu").stop();
            $("#panelMenu").animate({width:'5px'},250);
        });

        $(".mi").mouseover( function(){
            $(this).css('backgroundColor','#f9aB3C');
        });
        $(".mi").mouseout( function(){
            $(this).css('backgroundColor','#a9aBaC');
        });

        $(".ctsSel").change( function(){
            //alert( $(this).attr('checked') );
            $.ajax({
                url: "<?php echo site_url('panel/categories/setShowFiles/'); ?>",
                type: "post",
                data: {
                    id: $(this).attr('id').substr(7),
                    show: ($(this).attr('checked')==true?1:0)
                },
                success: show_files,
                cache: false
            });
        });

        $('#showNoFiles').click(function(){

            $(".ctsSel").each(function(){
                $(this).attr('checked','') 
            });
            
            $.ajax({
                url: "<?php echo site_url('panel/categories/clearShowFiles/'); ?>",
                type: "post",
                success: show_files,
                cache: false
            });
        });

        $("#sortNameAsc").click( function(){
            $.post("<?php echo site_url('panel/files/setSortType/name/asc'); ?>", show_files );
        });
        $("#sortNameDesc").click( function(){
            $.post("<?php echo site_url('panel/files/setSortType/name/desc'); ?>", show_files );
        });
        $("#sortDateAsc").click( function(){
            $.post("<?php echo site_url('panel/files/setSortType/date/asc'); ?>", show_files );
        });
        $("#sortDateDesc").click( function(){
            $.post("<?php echo site_url('panel/files/setSortType/date/desc'); ?>", show_files );
        });

        $('#showFilesID').click(function(){

            //ser = "ft[]=1&ft[]=2&ft[]=3";
            ser = "";
            $(".ctsSel").each(function(){
                if ( $(this).attr('checked') ){
                    //ctsSel_'.$c->id.
                    ser += ( "ft[]="+$(this).attr('id').substr(7)+"&" );
                }
            });
        
            if ( ser.length > 0 ) ser = ser.substr(0,ser.length-1);

            //alert(ser);
            
            $.ajax({
                url: "<?php echo site_url('panel/singlegalleryedit/testArray/'); ?>",
                type: "post",
                data: ser,
                success: function(data){ $("#photosList").html(data); },
                cache: false
            });
        });

        $('#createGallery').click(function(){
            $.post("<?php echo site_url('panel/galleries/add/'.$categoryID); ?>", function(){ alert("Galeria dodana.") } );
        });

        $("#newPhotoBtn").click( function(){ //alert(' ' + <?php echo $galleryID; ?> );
            $.post("<?php echo site_url('panel/photos/add/'.$galleryID); ?>", 
            //function(data){ alert(data); } );
            show_photos );
        });

        swfu = new SWFUpload({
            // Backend Settings
            upload_url: "<?php echo site_url('panel/files/upload/'.$categoryID); ?>",

            // File Upload Settings
            file_size_limit : "15 MB",
            file_types : "*.jpg;*.png",
            file_types_description : "JPG Images; PNG Image",
            file_upload_limit : 0,

            // Event Handler Settings - these functions as defined in Handlers.js
            //  The handlers are not part of SWFUpload but are part of my website and control how
            //  my website reacts to the SWFUpload events.
            swfupload_preload_handler : preLoad,
            swfupload_load_failed_handler : loadFailed,
            file_queue_error_handler : fileQueueError,
            file_dialog_complete_handler : fileDialogComplete,
            upload_progress_handler : uploadProgress,
            upload_error_handler : uploadError,
            upload_success_handler : uploadSuccess,
            upload_complete_handler : uploadComplete,

            // Button Settings
            button_image_url : "<?php echo base_url(); ?>images/SmallSpyGlassWithTransperancy_17x18.png",
            button_placeholder_id : "spanButtonPlaceholder",
            button_width: 130,
            button_height: 18,
            button_text : '<span class="button">Wyślij plik (2 MB Max)</span>',
            button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
            button_text_top_padding: 0,
            button_text_left_padding: 2,
            button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
            button_cursor: SWFUpload.CURSOR.HAND,

            // Flash Settings
            flash_url : "<?php echo base_url(); ?>files/scripts/swfupload/swfupload.swf",
            flash9_url : "<?php echo base_url(); ?>files/scripts/swfupload/swfupload_fp9.swf",

            custom_settings : {
                upload_target : "divFileProgressContainer"
                ,thumbnail_height: 360
                ,thumbnail_width: 480
                ,thumbnail_quality: 100
            },
            // Debug Settings
            debug: false
        });
    });


// ]]>
</script>