<script type="text/javascript">
 // <![CDATA[
 
    function show_pages(){ 
        $.post("<?php echo site_url('panel/pages/toHtml'); ?>",
            function(data){ $("#pagesList").html(data); }
        );}

    function del_page(pi){
        if( !confirm('Na pewno usunąć stronę ?') ) return false;
        $.ajax({
            url: "<?php echo site_url('panel/pages/del'); ?>",
            type: "post",
            data: { id: $(pi).attr('id').substr(3) },
            success: function(data){ 
                //console.log(data); 
                show_pages(); },
            cache: false
        });
    }
    
    function change_text(lang,pi){
        $.ajax({
            url: "<?php echo site_url('panel/pages/modify'); ?>",
            type: "post",
            data: { 
                id: $(pi).attr('id').substr(4),
                what: "fullText_" + lang,
                val: $(pi).attr('value')
            },
            cache: false
        });
    }
    
    $(document).ready( function() {
        show_pages();

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

        $('#createPage').click(function(){
            var name = $('#newPageName').attr('value');
            
            if( name === '') { alert("Nazwa nie może być pusta"); return; }
            
            //console.log(name);
            var multi = ($('#newPageMulti').attr('checked') !== undefined) ? '1' : '0';
            //console.log(multi);
                
            $.post( "<?php echo site_url('panel/pages/add/'); ?>/" + name + "/" + multi,
                function(data) { 
                    console.log(data); 
                    if(data==='1') alert("Jest juz strona : " + name); 
                    else { 
                        alert("Nowa strona :"+name+" dodana");
                        $('#newPageName').attr('value','');
                        show_pages();
                    }
                    
            });
        });
    });


// ]]>
</script>

