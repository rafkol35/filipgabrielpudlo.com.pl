<script type="text/javascript">
    // <![CDATA[

    function show_galleries(){
        $.ajax({
            url: "<?php echo site_url('panel/galleries/toHtml'); ?>",
            type: "post",
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

    $(document).ready( function() {
        show_galleries();
        
        $("#nnb").click( function(){
            $.post("<?php echo site_url('panel/galleries/add'); ?>", show_galleries );
        });
    });

    // ]]>
</script>

