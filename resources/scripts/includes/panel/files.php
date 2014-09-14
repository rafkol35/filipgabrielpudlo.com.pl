<script type="text/javascript">
 // <![CDATA[
    function del_file(id,g){
        if ( !confirm('Na pewno usunąć ' + g + ' ?') ) return false;
        var deletePhotos = confirm('Usunąć wszystkie zdjęcia z galerii pokazujące ten plik ?');
        //alert ( deletePhotos );
        //return;
        $.ajax({
            url: "<?php echo site_url('panel/files/del'); ?>",
            type: "post",
            data: {
                id: id,
                //name: g,
                delPhotos: (deletePhotos==true?1:0)
            },
            //success: function(data){ $("#filesList").html(data); },
            success: function() { show_files(); },
            cache: false
        });
    }

    function show_files(){
        $.ajax({
            url: "<?php echo site_url('panel/files/toHtml'); ?>",
            type: "post",
            //data: {pg_gfx: p},
            success: function(data){ $("#filesList").html(data); },
            cache: false
        });
    }

    var swfu;

    $(document).ready( function() {
        show_files();

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

    //});

    //window.onload = function () {
        swfu = new SWFUpload({
            // Backend Settings
            upload_url: "<?php echo site_url('panel/files/upload'); ?>",

            // File Upload Settings
            file_size_limit : "10 MB",
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
            button_image_url : "<?php echo base_url(); ?>resources/images/SmallSpyGlassWithTransperancy_17x18.png",
            button_placeholder_id : "spanButtonPlaceholder",
            button_width: 180,
            button_height: 18,
            button_text : '<span class="button">Select Images <span class="buttonSmall">(2 MB Max)</span></span>',
            button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
            button_text_top_padding: 0,
            button_text_left_padding: 18,
            button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
            button_cursor: SWFUpload.CURSOR.HAND,

            // Flash Settings
            flash_url : "<?php echo base_url(); ?>files/scripts/swfupload/swfupload.swf",
            flash9_url : "<?php echo base_url(); ?>files/scripts/swfupload/swfupload_fp9.swf",

            custom_settings : {
                upload_target : "divFileProgressContainer"
                /*thumbnail_height: 400,
                thumbnail_width: 300,
                thumbnail_quality: 100*/
            },
            // Debug Settings
            debug: false
        });
    });
// ]]>
</script>
