<script type="text/javascript">
    // <![CDATA[

    function show_files(){
        $.ajax({
            url: "<?php echo site_url('panel/index/downloadableFilesToHtml/'); ?>",
            type: "post",
            success: function(data) { $("#downloadableFilesList").html(data); },
            cache: false
        });
    }

    function del_file(file){

        if( !confirm('Na pewno usunąć ' + file + " ?"  ) ) return false;

        $.ajax({
            url: "<?php echo site_url('panel/index/deleteDownloadableFile/'); ?>",
            type: "post",
            data: { delFile: file },
            success: show_files,
            cache: false
        });
    }

    $(document).ready( function() {
        show_files();

        $("#panelMenu").css('width','5px');
        //$("#panelMenu").css('background','#ffcc22');

        $("#panelMenu").mouseover( function(){
            $("#panelMenu").stop();
            $("#panelMenu").animate({width:'175px'},100);
            $("#panelMenu").css('background','#898B8C');
        });
        $("#panelMenu").mouseout( function(){
            $("#panelMenu").stop();
            $("#panelMenu").animate({width:'5px'},250,function(){ //$("#panelMenu").css('background','#ffcc22');
            });
        });

        $(".mi").mouseover( function(){
            $(this).css('backgroundColor','#f9aB3C');
        });
        $(".mi").mouseout( function(){
            $(this).css('backgroundColor','#a9aBaC');
        });

        var swfu;
        window.onload = function() {
            var settings = {
                flash_url : "<?php echo base_url(); ?>files/scripts/swfupload2/swfupload.swf",

                upload_url: "<?php echo site_url('/iea/uploadFile/'); ?>",

                //post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
                file_size_limit : "100 MB",
                file_types : "*.*",
                file_types_description : "Wszystkie pliki",
                file_upload_limit : 100,
                file_queue_limit : 0,
                custom_settings : {
                    progressTarget : "fsUploadProgress",
                    cancelButtonId : "btnCancel"
                },
                debug: false,

                // Button settings
                button_image_url: "images/TestImageNoText_65x29.png",
                button_width: "165",
                button_height: "29",
                button_placeholder_id: "spanButtonPlaceHolder",
                button_text: '<span class="theFont">Wybierz pliki</span>',
                button_text_style: ".theFont { font-size: 14; background-color: #888888; }",
                button_text_left_padding: 12,
                button_text_top_padding: 3,

                // The event handler functions are defined in handlers.js
                file_queued_handler : fileQueued,
                file_queue_error_handler : fileQueueError,
                file_dialog_complete_handler : fileDialogComplete,
                upload_start_handler : uploadStart,
                upload_progress_handler : uploadProgress,
                upload_error_handler : uploadError,
                upload_success_handler : uploadSuccess,
                upload_complete_handler : uploadComplete,
                queue_complete_handler : queueComplete	// Queue plugin event
            };
            swfu = new SWFUpload(settings);
        };
    });
// ]]>
</script>
