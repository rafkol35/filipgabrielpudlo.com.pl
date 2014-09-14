<script type="text/javascript">
    // <![CDATA[
    
    function printAlbums(){
        //console.log('aa');
        $.ajax({
            url: "<?php echo site_url('panel/page/printGalleryAlbums/'); ?>",
            type: "post",
            success: function(data) {
                //console.log(data);
                $("#albumsList").html(data);
            },
            cache: false
        });
    }
    
    function addAlbumAssoc() {
        $.ajax({
            url: "<?php echo site_url('panel/page/addAlbumGalleryAssoc/')?>",
            type: "post",
            success: function(data) {
                console.log(data);
                printAlbums();
            },
            cache: false
        });
    }
    
    function removeAlbumAssoc(id){
        if( !confirm("Czy chcesz usunąć album z galerii ?") ) return false;
        $.post("<?php echo site_url('panel/page/removeAlbumGalleryAssoc'); ?>/" + id, printAlbums);
    }
    
    function assocGalleryAlbum(mi){
        //console.log(mi);
        //console.log($(mi));
        //console.log( $(mi).attr('id') );
        
        var agaid = $(mi).attr('id').substr(3);
        //console.log(agaid);
        
        var s = "#" + $(mi).attr('id');
        var albumid = $(s + " option:selected" ).attr("id");
        
        //console.log(albumid);
        
        //return ;
        
        $.ajax({
            url: "<?php echo site_url('panel/page/modifyAGA'); ?>",
            type: "post",
            data: { 
                whatID: 'id',
                id: agaid,
                what: 'album_id',
                value: albumid.substr(3)
            },
            success: function(data){ 
                //console.log(data);
            },
            cache: false
        });   
    }
    
    $(document).ready(function() {
        //createTabs();
        printAlbums();
        $('#addAlbumAssoc').click(addAlbumAssoc);
    });
// ]]>
</script>
