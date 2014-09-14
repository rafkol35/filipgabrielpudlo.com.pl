<script type="text/javascript">
    // <![CDATA[
    
    function printAlbums(){
        //console.log('aa');
        $.ajax({
            url: "<?php echo site_url('panel/chapter/printAlbums/' . $chapterID); ?>",
            type: "post",
            success: function(data) {
                console.log(data);
                $("#albumsList").html(data);
            },
            cache: false
        });
    }
    
    function assocAlbum(mi){
        //console.log(mi);
        //console.log($(mi));
        //console.log( $(mi).attr('id') );
        
        var s = "#" + $(mi).attr('id');
        var id = $(s + " option:selected" ).attr("id");
        
        //console.log(s);
        //console.log(id);
        
        $.ajax({
            url: "<?php echo site_url('panel/chapter/modify'); ?>",
            type: "post",
            data: { 
                whatID: 'id',
                id: "<?php echo $chapterID; ?>",
                what: 'album_id',
                value: id.substr(3)
            },
            success: function(data){ 
                //show_menuitems(); 
                //console.log(data);
            },
            cache: false
        });

    }
    
    //function startEdit
    
    $(document).ready(function() {
        createTabs();
        //printAlbums();
    });
// ]]>
</script>
