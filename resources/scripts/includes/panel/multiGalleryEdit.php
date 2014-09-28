<script type="text/javascript">
    // <![CDATA[
    function isInteger(x) {
        if (isNaN(x))
            return false;
        if (x == Math.round(x))
            return true;
        return false;
    }

    function setAutoRadios() {
//        alert('sar');
        $.ajax({
            url: "<?php echo site_url('panel/index/getNewsAuto'); ?>",
            type: "post",
            success: function(data) {
                if (data == '1') {
                    $('#RnewsautoOn').attr('checked', 'checked');
                } else {
                    $('#RnewsautoOff').attr('checked', 'checked');
                }
            },
            cache: false
        });
    }

    function setNewsAuto(state) {
        $.ajax({
            url: "<?php echo site_url('panel/index/setNewsAuto'); ?>",
            type: "post",
            data: {
                state: state
            },
            cache: false
        });
    }

    function newAutoOn() {
        setNewsAuto('1');
    }

    function newsAutoOff() {
        setNewsAuto('0');
    }

    function setNewsText(lang, nd) {
        $.ajax({
            url: "<?php echo site_url('panel/index/setNewsText'); ?>",
            type: "post",
            data: {
                lang: lang,
                val: $(nd).attr('value')
            },
            cache: false
        });
    }

    function setNewsScrollSpeed(nd) {
        var newSpeed = $(nd).attr('value');

        if (!isInteger(newSpeed)) {
            alert("Wpisz liczbę");
            return;
        }
        else if (newSpeed > 10 || newSpeed < 1) {
            alert("Wpisz liczbę z zakresu 1-10");
            return;
        }

        $.ajax({
            url: "<?php echo site_url('panel/index/setNewsScrollSpeed'); ?>",
            type: "post",
            data: {
                val: newSpeed
            },
            cache: false
        });
    }

    function setText(lang) {
        var ed = tinyMCE.get('fullText');
        $.ajax({
            url: "<?php echo site_url('panel/categories/modify'); ?>",
            type: "post",
            data: {id: <?php echo $categoryID; ?>,
                what: "desc_" + lang,
                val: ed.getContent()
            },
            success: function() {
                alert("Tekst zmieniony");
            },
            cache: false
        });
    }

    function change_gallery_showdesc(nd) {
        $.ajax({
            url: "<?php echo site_url('panel/categories/modify'); ?>",
            type: "post",
            data: {
                id: <?php echo $categoryID; ?>,
                what: "showMultiGalleryDesc",
                val: ($(nd).attr('checked') == true ? 1 : 0)
            },
            cache: false
        });
    }

    function show_galleries(page, itemsOnPage) {
        
        //console.log(" " + page + " " + itemsOnPage);
    
        $.ajax({
            url: "<?php echo site_url('panel/galleries/toHtml'); ?>",
            type: "post",
            data: {
                id: <?php echo $categoryID; ?>,
                whichPage: page,
                ins: itemsOnPage
            },
            success: function(data) {
                //console.log(data);
                //jsd = jQuery.parseJSON(data)
                //console.log(jsd);
                $("#galleriesList").html(data);

                $(".alsel").each(function() {
                    var sid = $(this).attr('id').substr(6);
                    if ($(this).val() == 'BRAK') {
                        $('#edal_' + sid).hide();
                    }
                });
                
                addsortable(page*itemsOnPage);
                
               updatePagesLabel(page,itemsOnPage);
            },
            cache: false
        });
    }
    
    function updatePagesLabel(page,itemsOnPage){
        
        $("#pagesNums").html("");
        
        $.ajax({
            url: "<?php echo site_url('panel/galleries/howManyAll'); ?>",
            type: "post",
            //dataType: "json",
            data: {
                id: <?php echo $categoryID; ?>
            },
            success: function(data) {
                numberOfItems = data;
                numberOfPages = numberOfItems / itemsOnPage;
                
                for( var i = 0 ; i < numberOfPages ; ++i ){
                    if( i !== page ){
                        $("#pagesNums").append("<span style=\"cursor: pointer; \" onclick=\"show_galleries("+i+","+itemsOnPage+"); \">" + (i+1) + "</span> ");
                    }
                    else{
                        $("#pagesNums").append("<span style=\"background-color: #ddd;\">" + (i+1) + "</span> ");
                    }   
                }      
            },
            cache: false
        });
    }

    function del_gallery(pi) {
        if (!confirm('Na pewno usunąć ?'))
            return false;
        $.ajax({
            url: "<?php echo site_url('panel/galleries/del'); ?>",
            type: "post",
            data: {id: $(pi).attr('id').substr(3)},
            success: show_galleries_std,
            cache: false
        });
    }

    function change_gallery_title(lang, nd) {
        $.ajax({
            url: "<?php echo site_url('panel/galleries/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(9),
                what: ("title_" + lang),
                val: $(nd).attr('value')
            },
            cache: false
        });
    }

    function change_gallery_show(nd) {
        $.ajax({
            url: "<?php echo site_url('panel/galleries/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(7),
                what: "show",
                val: ($(nd).attr('checked') == true ? 1 : 0)
            },
            cache: false
        });
    }

    function addsortable(start) {
        $("#galleriesList").sortable({
            placeholder: 'ui-state-highlight',
            update: function() {
                serial = $('#galleriesList').sortable('toArray');
                //serial = $('#galleriesList').sortable('serialize');
                //console.log(serial);
                //console.log(serial.length);
                $.ajax({
                    url: "<?php echo site_url('panel/galleries/sort/'); ?>",
                    type: "post",
                    //data: serial,
                    data: {
                        gl: serial,
                        startNum: start,
                        prefix: "gl_"
                    },
//                    success: function(data){
//                        console.log(data);
//                    },
                    error: function() {
                        alert("theres an error with AJAX");
                    }
                });
            }
        });
    }

    function selChange(combo) {
        console.log("multigallery");
        var galleryId = combo.id.substr(6);
        var newAlbumId = $("#" + combo.id + " option:selected").attr('id').substr(4);

        if (newAlbumId == 'mj') {
            newAlbumId = -1;
            $('#edal_' + galleryId).hide();
        } else {
//            newAlbumId = newAlbumId.substr(3);
            $('#edal_' + galleryId).show();
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

    function show_galleries_std(){
        show_galleries(0, $("#itemOnPage").attr("value") );
    }
    
    $(document).ready(function() {
        show_galleries_std();
        
        setAutoRadios();

        $("#panelMenu").css('width', '5px');

        $("#panelMenu").mouseover(function() {
            $("#panelMenu").stop();
            $("#panelMenu").animate({width: '175px'}, 100);
            $("#panelMenu").css('background', '#898B8C');
        });
        $("#panelMenu").mouseout(function() {
            $("#panelMenu").stop();
            $("#panelMenu").animate({width: '5px'}, 250, function() { //$("#panelMenu").css('background','#ffcc22'); 
            });
        });

        $(".mi").mouseover(function() {
            $(this).css('backgroundColor', '#f9aB3C');
        });
        $(".mi").mouseout(function() {
            $(this).css('backgroundColor', '#a9aBaC');
        });

        $('#createGallery').click(function() {
            $.post("<?php echo site_url('panel/galleries/add/' . $categoryID); ?>", show_galleries_std);
        });

        $('#setItemOnPage').click( function() { show_galleries_std(); });
        
        tinyMCE.init({
            // General options
            mode: "textareas",
            theme: "advanced",
            plugins: "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
            // Theme options
            theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontsizeselect",
            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "bottom",
            theme_advanced_resizing: true,
            // Example content CSS (should be your site CSS)
            content_css: "css/content.css",
            // Drop lists for link/image/media/template dialogs
            template_external_list_url: "lists/template_list.js",
            external_link_list_url: "lists/link_list.js",
            external_image_list_url: "lists/image_list.js",
            external_image_list_url : "<?php echo site_url('panel/upload/getGfxList'); ?>",
                    //external_image_list_url : "<?php echo base_url() . 'files/scripts/imagesList.php.js' ?>",
                    //external_image_list_url : "<?php echo base_url() . 'files/scripts/imageList.php' ?>",
                    //external_image_list_url : "<?php echo base_url() . 'files/scripts/imageList.js' ?>",
                    media_external_list_url: "lists/media_list.js",
            // Style formats
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ],
            convert_urls: false,
            // Replace values for the template plugin
            template_replace_values: {
                username: "Some User",
                staffid: "991234"
            },
            language: 'pl'
        });

    });


// ]]>
</script>

