<?php /*
<script type="text/javascript">
 // <![CDATA[

    function show_galleries(){
        $.ajax({
            url: "<?php echo site_url('panel/galleries/newsToHtml'); ?>",
            type: "post",
            data: { id: <?php echo $categoryID; ?> },
            success: function(data){ $("#galleriesList").html(data); } ,
            cache: false
        });
    }

    function del_gallery(pi){
        if( !confirm('Na pewno usunąć ?') ) return false;
        $.ajax({
            url: "<?php echo site_url('panel/galleries/del'); ?>",
            type: "post",
            data: {id: $(pi).attr('id').substr(3) },
            success: show_galleries,
            cache: false
        });
    }

    function change_gallery_title(nd){
        $.ajax({
            url: "<?php echo site_url('panel/galleries/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(6),
                what: "title_pl",
                val: $(nd).attr('value')
            },
            cache: false
        });
    }

    function change_gallery_show(nd){
        $.ajax({
            url: "<?php echo site_url('panel/galleries/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(7),
                what: "show",
                val: ($(nd).attr('checked')==true?1:0)
            },
            cache: false
        });
    }

    function addsortable(){
        $("#galleriesList").sortable({
            placeholder: 'ui-state-highlight',
            update : function () {
                serial = $('#galleriesList').sortable('serialize');
                $.ajax({
                    url: "<?php echo site_url('panel/galleries/sort/'); ?>",
                    type: "post",
                    data: serial,
                    error: function(){ alert("theres an error with AJAX"); }
                });
            }
        });
    }

    $(document).ready( function() {
        show_galleries();
        addsortable();

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

        $('#createNew').click(function(){ 
            $.post("<?php echo site_url('panel/galleries/add/'.$categoryID); ?>", show_galleries );
        });


    });


// ]]>
</script>
*/
?>

