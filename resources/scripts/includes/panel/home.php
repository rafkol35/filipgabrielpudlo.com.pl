<script type="text/javascript">
    // <![CDATA[

    function assocGalleryAlbum(mi){
        //console.log("mi");
        //console.log($(mi));
        //console.log( $(mi).attr('id') );
        
        var agaid = $(mi).attr('id').substr(3);
        console.log(agaid);
        
        var s = "#" + $(mi).attr('id');
        var albumid = $(s + " option:selected" ).attr("id");
        
        console.log(albumid);
        
        //return ;
        
        $.ajax({
            url: "<?php echo site_url('panel/projects/modify'); ?>",
            type: "post",
            data: { 
                //whatID: 'id',
                id: agaid,
                what: 'album_id',
                val: albumid.substr(3)
            },
            success: function(data){ 
                console.log(data);
            },
            cache: false
        });   
    }
    
    function assocLastestNewToPost(select){
        var latestNewNum = $(select).attr('id').substr(5);
        //console.log(latestNewNum);
        var s = "#" + $(select).attr('id');
        var postid = $(s + " option:selected" ).attr("id");
        //console.log(postid);
        
        $.ajax({
            url: "<?php echo site_url('panel/index/setLatestNewLink'); ?>",
            type: "post",
            data: { 
                lnn: latestNewNum,
                postid: postid.substr(3)
            },
            success: function(){ 
                //console.log(data);
            },
            cache: false
        });   
    }

    function saveTexts() {
        var ed1 = tinyMCE.get('homelatest1');
        var ed2 = tinyMCE.get('homelatest2');
        var ed3 = tinyMCE.get('homelatest3');
        $.ajax({
            url: "<?php echo site_url('panel/index/setTextsHome'); ?>",
            type: "post",
            data: {
                text1: ed1.getContent(),
                text2: ed2.getContent(),
                text3: ed3.getContent()
            },
            success: function() {
                alert("Tekst zmieniony");
            },
            cache: false
        });
    }

    function changeFilmIncidence(file,lineEdit){
        //console.log( "changeFilmIncidence(lineEdit) : " + file );
        //console.log( $(lineEdit).val() );
        //console.log( $(lineEdit).value() );
        
        var newVal = $(lineEdit).val();
        if( isNaN(newVal) ){
            alert("Wpisz liczbe!");
            //$(lineEdit).val( $(lineEdit).value() );
            // pobieram i wstawiam poprzednia wartosc
            
            return;
        }
        
        if( newVal < 0 ){
            alert("Wpisz liczbe >= 0!");
            return;
        }
        
        $.ajax({
            url: "<?php echo site_url('panel/index/setFilmIncidence'); ?>",
            type: "post",
            data: {
                file: file,
                incidence: newVal
            },
            success: function() {
                
            },
            cache: false
        });
    }

    tinymce.init({
        selector:  "textarea",
    plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjust if y | bullist numlist outdent indent | link image"
        });

    $(document).ready( function() {
       // alert('asdf');
    $("#panelMenu").css('width','5px') ;
        
        $("#panelMenu").mouseover( function(){
            $("#panelMenu").stop();
            $("#panelMenu").animate({width:'175px'},100);
            });
        $("#panelMenu").mouseout( function(){
                $("#panelMenu").stop();
            $("#panelMenu").animate({width:'5px'},250);
            });

                $(".mi"). mouseover( function(){
            $(this).css('backgroundColor','#f9aB3C');
        });
        $(".mi").mouseout( function(){
            $(this).css('backgroundColor','#a9aBaC');
        });
    });
// ]]>
</script>

