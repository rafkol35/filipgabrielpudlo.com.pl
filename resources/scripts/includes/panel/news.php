<script type="text/javascript">
    // <![CDATA[

    function change_new_show(nd){
        $.ajax({
            url: "<?php echo site_url('panel/news/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(7),
                what: "show",
                val: ($(nd).attr('checked')==true?1:0)
            },
            cache: false
        });
    }

    function change_new_title(nd){
        $.ajax({
            url: "<?php echo site_url('panel/news/modify'); ?>",
            type: "post",
            data: {
                id: $(nd).attr('id').substr(7),
                what: "title",
                val: $(nd).attr('value')
            },
            cache: false
        });
    }

    function show_news(){
        $.ajax({
            url: "<?php echo site_url('panel/news/toHtml'); ?>",
            type: "post",
            success: function(data){ $("#newsList").html(data); } ,
            cache: false
        });
    }

    function addsortable(){
        $("#newsList").sortable({
            placeholder: 'ui-state-highlight',
            update : function () {
                serial = $('#newsList').sortable('serialize');
                $.ajax({
                    url: "<?php echo site_url('panel/news/sort'); ?>",
                    type: "post",
                    data: serial,
                    error: function(){ alert("theres an error with AJAX"); }
                });
            }
        });
    }

    function del_new(pi){
        if( !confirm('Na pewno usunąć ?') ) return false;
        $.ajax({
            url: "<?php echo site_url('panel/news/del'); ?>",
            type: "post",
            data: {id: $(pi).attr('id').substr(3) },
            success: show_news,
            cache: false
        });
    }

    $(document).ready( function() {
        show_news();
        addsortable();

        $("#nnb").click( function(){
            $.post("<?php echo site_url('panel/news/add'); ?>", show_news );
        });
    });
    
    // ]]>
</script>
