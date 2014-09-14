<script type="text/javascript">
    // <![CDATA[

    var sortType;
    var sort;
    var page;
    var itemsOnPage;
    
    function del_album(id){
        if( !confirm('Na pewno usunąć ?') ) return false;
        $.ajax({
            url: "<?php echo site_url('panel/albums/del'); ?>",
            type: "post",
            //data: { id: $(pi).attr('id').substr(3) },
            data: { id: id },
            success: show_albums_std,
            cache: false
        });
    }

    function change_album_name(nd){
        console.log(' ' + $(nd).attr('id').substr(9) + ' ' + $(nd).val());
        $.ajax({
            url: "<?php echo site_url('panel/albums/modify'); ?>",
            type: "post",
            data: {
                sw: 'id',
                sv: $(nd).attr('id').substr(9),
                w: 'name',
                v: $(nd).val()
            },
            cache: false
        });
    }

    function show_albums(sortType,sort,page,itemsOnPage){
    //        alert ( sortType + sort );
        $.ajax({
            url: "<?php echo site_url('panel/albums/toHtml'); ?>",
            data: {
                sortType: sortType,
                sort: sort,
                whichPage: page,
                ins: itemsOnPage
            },
            type: "post",
            success: function(data) {
                $("#albumsList").html(data);
            },
            cache: false
        });
    }

//    function updatePagesLabel(page,itemsOnPage){
//        
//        $("#pagesNums").html("");
//        
//        $.ajax({
//            url: "<?php //echo site_url('panel/galleries/howManyAll'); ?>",
//            type: "post",
//            //dataType: "json",
//            data: {
//                id: <?php //echo $categoryID; ?>
//            },
//            success: function(data) {
//                numberOfItems = data;
//                numberOfPages = numberOfItems / itemsOnPage;
//                
//                for( var i = 0 ; i < numberOfPages ; ++i ){
//                    if( i !== page ){
//                        $("#pagesNums").append("<span style=\"cursor: pointer; \" onclick=\"show_galleries("+i+","+itemsOnPage+"); \">" + (i+1) + "</span> ");
//                    }
//                    else{
//                        $("#pagesNums").append("<span style=\"background-color: #ddd;\">" + (i+1) + "</span> ");
//                    }   
//                }      
//            },
//            cache: false
//        });
//    }
    
    function show_albums_std(){
        show_albums('date','desc', 0, $("#itemOnPage").attr("value"));
    }
    
    $(document).ready( function() {
        show_albums_std();

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

        $('#createAlbum').click(function(){
            $.post("<?php echo site_url('panel/albums/add/'); ?>", show_albums_std );
        });
    });

    // ]]>
</script>

