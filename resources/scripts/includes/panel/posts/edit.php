<script type="text/javascript">
 // <![CDATA[

    function setFullText(){
        var ed = tinyMCE.get('descFull');
        $.ajax({
            url: "<?php echo site_url('panel/posts/modify'); ?>",
            type: "post",
            data: {id: <?php echo $post->id; ?>,
                what: "desc",
                val: ed.getContent()
            },
            success: function(){
                alert("Tekst zmieniony");
            },
            cache: false
        });
    }

    function setShortText(){
        var ed = tinyMCE.get('descShort');
        $.ajax({
            url: "<?php echo site_url('panel/posts/modify'); ?>",
            type: "post",
            data: {id: <?php echo $post->id; ?>,
                what: "short_desc",
                val: ed.getContent()
            },
            success: function(){
                alert("Tekst zmieniony");
            },
            cache: false
        });
    }

tinymce.init({
    selector: "textarea",
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });

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
    });
// ]]>
</script>

?>
