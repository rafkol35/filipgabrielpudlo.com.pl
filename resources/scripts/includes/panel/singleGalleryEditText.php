<script type="text/javascript">
 // <![CDATA[

    function setText(lang){
        var ed = tinyMCE.get('fullText');
        $.ajax({
            url: "<?php echo site_url('panel/galleries/modify'); ?>",
            type: "post",
            data: {id: <?php echo $galleryID; ?>,
                what: ("desc_"+lang),
                val: ed.getContent()
            },
            success: function(){
                alert("Tekst zmieniony");
            },
            cache: false
        });
    }

    function selChange(combo){
    console.log("singlegallery");
        var galleryId = <?php echo $galleryID; ?>;
        var newAlbumId = $("#" + combo.id + " option:selected" ).attr('id').substr(3);

        if ( newAlbumId == 'mj' ){
            newAlbumId = -1;
            $('#edal_'+galleryId).hide();
        }else{
            $('#edal_'+galleryId).show();
        }

        $.ajax({
            url: "<?php echo site_url('panel/galleries/modify'); ?>",
            type: "post",
            data: {
                id: galleryId,
                what: "album_id",
                val: newAlbumId
            },
            cache: false
        });
    }

    $(document).ready( function() {

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

    });

// ]]>
</script>
