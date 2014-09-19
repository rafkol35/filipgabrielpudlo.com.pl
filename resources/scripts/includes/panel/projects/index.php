<script type="text/javascript">
 // <![CDATA[

    function redrawProjects(){
        show_projects();
        addsortable();
    }

    function changeSomething(idProj,whatChange,newVal,func){
        $.ajax({
            url: "<?php echo site_url('panel/projects/modify'); ?>",
            type: "post",
            data: {
                id: idProj,
                what: whatChange,
                val: newVal
            },
            success: func,
            cache: false
        });
    }

    function setProjectsPhotos(id){
        changeSomething(id,'type',0,redrawProjects);
    }

    function setProjectFilm(id){
        changeSomething(id,'type',1,redrawProjects);
    }

    function setProjectFilmLink(tF){
        changeSomething($(tF).attr('id').substr(7),'filmlink',$(tF).attr('value'),0);
    }

    function setProjectFilmWidht(tF){
        if ( $(tF).attr('value') <= 0 || $(tF).attr('value') > 378 ) {
            alert("Potrzeba liczby z zakresu 0-378");
            return;
        }
        changeSomething($(tF).attr('id').substr(8),'filmwidth',$(tF).attr('value'),0);
    }
    function setProjectFilmHeight(tF){
        if ( $(tF).attr('value') <= 0 ) {
            alert("Potrzeba liczby większej od 0");
            return;
        }
        changeSomething($(tF).attr('id').substr(9),'filmheight',$(tF).attr('value'),0);
    }

    function change_gallery_year(nd){
//        changeSomething($(nd).attr('id').substr(8),"year",$(nd).attr('value'),0);
        $.ajax({
            url: "<?php echo site_url('panel/projects/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(8),
                what: "year",
                val: $(nd).attr('value')
            },
            cache: false
        });
    }

    function change_gallery_readMore(nd){
//        changeSomething($(nd).attr('id').substr(7),"readMore",($(nd).attr('checked')==true?1:0),0);
        $.ajax({
            url: "<?php echo site_url('panel/projects/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(7),
                what: "readMore",
                val: ($(nd).attr('checked')==true?1:0)
            },
            cache: false
        });
    }

    function change_gallery_show(nd){
        $.ajax({
            url: "<?php echo site_url('panel/projects/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(7),
                what: "show",
                val: ($(nd).attr('checked')==true?1:0)
            },
            cache: false
        });
    }

    function change_gallery_title(lang,nd){
        $.ajax({
            url: "<?php echo site_url('panel/projects/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(9),
                what: "title_" + lang,
                val: $(nd).attr('value')
            },
            cache: false
        });
    }

    function del_gallery(pi){
        if( !confirm('Na pewno usunąć ?') ) return false;
        $.ajax({
            url: "<?php echo site_url('panel/projects/del'); ?>",
            type: "post",
            data: {id: $(pi).attr('id').substr(3) },
            success: show_projects,
            cache: false
        });
    }

    function addsortable(){
        $("#projectsList").sortable({
            placeholder: 'ui-state-highlight',
            update : function () {
                serial = $('#projectsList').sortable('serialize');
                $.ajax({
                    url: "<?php echo site_url('panel/projects/sort/'); ?>",
                    type: "post",
                    data: serial,
                    error: function(){ alert("theres an error with AJAX"); }
                });
            }
        });
    }

    function show_projects(){
        console.log( "<?php echo site_url('panel/projects/toHtml'); ?>" );
        $.ajax({
            url: "<?php echo site_url('panel/projects/toHtml'); ?>",
            type: "post",
            success: function(data){ 
                console.log('asdf')
                $("#projectsList").html(data); 
            } ,
            cache: false
        });
    }

    $(document).ready( function() {
        console.log("ready");
        
        show_projects();
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

        $('#createProject').click(function(){
            $.post("<?php echo site_url('panel/projects/add/'); ?>", show_projects );
        });
    });
// ]]>
</script>
