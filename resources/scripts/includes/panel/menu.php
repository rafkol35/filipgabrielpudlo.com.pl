<script type="text/javascript">
 // <![CDATA[
 
    function show_menuitems(){ 
        $.post("<?php echo site_url('panel/menu/toHtml'); ?>",
            function(data){ $("#menuItemsList").html(data); }
        );}

    function change_text(lang,pi){
        $.ajax({
            url: "<?php echo site_url('panel/menu/modify'); ?>",
            type: "post",
            data: { 
                id: $(pi).attr('id').substr(3),
                what: "text_" + lang,
                val: $(pi).attr('value')
            },
            cache: false
        });
    }

    function menuitem_newlink(mi){
        //console.log(mi);
        //console.log($(mi));
        //console.log( $(mi).attr('id') );
        
        var s = "#" + $(mi).attr('id');
        var id = $(s + " option:selected" ).attr("id");
        
        $.ajax({
            url: "<?php echo site_url('panel/menu/modify'); ?>" + "/" + $(mi).attr('id').substr(3),
            type: "post",
            data: { 
                id: $(mi).attr('id').substr(3),
                what: 'page_id',
                val: id.substr(3)
            },
            //success: function(data){ show_menuitems(); },
            cache: false
        });

    }
    
    function add_menuitem(mi){   
        $.ajax({
            url: "<?php echo site_url('panel/menu/add'); ?>" + "/" + $(mi).attr('id').substr(3),
            type: "post",
            success: function(data){ show_menuitems(); },
            cache: false
        });
    }
    function del_menuitem(mi){
        if( !confirm('Na pewno usunąć element (zostaną usunięte także wszystkie dołączone) ?') ) return false;
        $.ajax({
            url: "<?php echo site_url('panel/menu/del'); ?>" + "/" + $(mi).attr('id').substr(3),
            type: "post",
            success: function(data){ console.log(data); show_menuitems(); },
            cache: false
        });
    }
    function menuitem_moveup(mi){
        $.ajax({
            url: "<?php echo site_url('panel/menu/itemup'); ?>" + "/" + $(mi).attr('id').substr(3),
            type: "post",
            success: function(data){ console.log(data); show_menuitems(); },
            cache: false
        });
    }
    function menuitem_movedown(mi){
        $.ajax({
            url: "<?php echo site_url('panel/menu/itemdown'); ?>" + "/" + $(mi).attr('id').substr(3),
            type: "post",
            success: function(data){ console.log(data); show_menuitems(); },
            cache: false
        });
    }

    function groupViewToggle(groupDiv){
        console.log("aaa" + $(this).height());  
    }
    
    $(document).ready( function() {
        show_menuitems();

        $("#panelMenu").css('width','5px');
        
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
    });


// ]]>
</script>

