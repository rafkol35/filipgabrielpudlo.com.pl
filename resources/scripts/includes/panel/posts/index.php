<script type="text/javascript">
 // <![CDATA[

    function redrawPosts(){
        show_posts();
    }

    function changeSomething(id,whatChange,newVal,func){
        $.ajax({
            url: "<?php echo site_url('panel/posts/modify'); ?>",
            type: "post",
            data: {
                id: id,
                what: whatChange,
                val: newVal
            },
            success: func,
            cache: false
        });
    }

    function change_post_title(nd){
        //console.log( " " + $(nd).attr('id').substr(9)+ " " + 'title' + " " + $(nd).val() );
        changeSomething($(nd).attr('id').substr(9),'title',$(nd).val());
    }

    function change_post_show(nd){
        //console.log( " " + $(nd).attr('id').substr(7)+ " " + 'show' + " " + $(nd).val() );
        changeSomething($(nd).attr('id').substr(7),'show',$(nd).val());
    }
    
    function del_post(pi){
        if( !confirm('Na pewno usunąć ?') ) return false;
        //console.log( "id: " + $(pi).attr('id').substr(3) );
        $.ajax({
            url: "<?php echo site_url('panel/posts/del'); ?>",
            type: "post",
            data: {id: $(pi).attr('id').substr(3) },
            success: show_posts,
            cache: false
        });
    }

    function show_posts(){
        $.ajax({
            url: "<?php echo site_url('panel/posts/toHtml'); ?>",
            type: "post",
            success: function(data){ 
                $("#postsList").html(data); 
            } ,
            cache: false
        });
    }

    function asc(){
        console.log("mi");
    }
    
    $(document).ready( function() {
        show_posts();

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

        $('#createPost').click(function(){
            $.post("<?php echo site_url('panel/posts/add/'); ?>", show_posts );
        });
    });
// ]]>
</script>
