<script type="text/javascript">
// <![CDATA[
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
                external_image_list_url : "<?php echo site_url('panel/upload/getGfxList'); ?>",
		//external_image_list_url : "<?php echo base_url().'files/scripts/imagesList.php.js' ?>",
                //external_image_list_url : "<?php echo base_url().'files/scripts/imageList.php' ?>",
                //external_image_list_url : "<?php echo base_url().'files/scripts/imageList.js' ?>",
                media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

                convert_urls : false,

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		},

                language: 'pl'
	});

    function modify(){
        var ed = tinyMCE.get('textcontent');
        $.ajax({
            url: "<?php echo site_url('panel/galleries/modify'); ?>",
            type: "post",
            data: {id: <?php echo $gallery->id; ?>,
                title: 'new title',
                text: ed.getContent()
            },
            success: function(){
                alert("Tekst zmieniony");
            },
            cache: false
        });
    }
    // ]]>
</script>

<script type="text/javascript">
    // <![CDATA[

    function fillPhotosDiv(data){
        $("#photosList").html(data);
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

    function show_photos(){
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
            },
            cache: false
        });
    }

    function change_photo_title(nd,lng){
        //alert ( " " + $(nd).attr('id') + " " + lng +  " " + $(nd).attr('value') );
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
                //alert(serial);
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
        //alert( " " + $(pi).attr('id').substr(3) );
        $.ajax({
            url: "<?php echo site_url('panel/photos/del/'); ?>",
            type: "post",
            data: {id: $(pi).attr('id').substr(3) },
            success: show_photos,
            cache: false
        });
    }

    $(document).ready( function() {
        show_photos();
        show_files();
        addsortable();

        $("#nnb").click( function(){ 
            $.post("<?php echo site_url('panel/photos/add/'.$galleryID); ?>", show_photos );
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

    });

    // ]]>
</script>
