<script type="text/javascript">
    // <![CDATA[
    
     function addsortable() {
        $("#chaptersList").sortable({
            placeholder: 'ui-state-highlight',
            update: function() {
                serial = $('#chaptersList').sortable('serialize');
                //console.log(serial);
                $.ajax({
                    url: "<?php echo site_url('panel/page/sortChapters/'); ?>",
                    type: "post",
                    data: serial,
                    error: function() {
                        alert("theres an error with AJAX");
                    },
                    success: function(data){
                        //console.log(data);
                    }
                });
            }
        });
    }
    
    function printChapters() {
        $.ajax({
            url: "<?php echo site_url('panel/page/printChapters/' . $pageID); ?>",
            type: "post",
            success: function(data) {
                $("#chaptersList").html(data);
                addsortable();
            },
            cache: false
        });
    }
    
    function removeChapter(id) {
        if( !confirm("Czy chcesz usunąć rozdział ?") ) return false;
        $.post("<?php echo site_url('panel/page/removeChapter'); ?>/" + id, printChapters);
    }

    function addChapter() {
        $.ajax({
            url: "<?php echo site_url('panel/page/addChapter/' . $pageID)?>/" + $('#newChapterName').val(),
            type: "post",
            success: function(data) {
                if( data === "1" ){
                    alert("Jest już rodział " + $('#newChapterName').val() + " na tej stronie. Wybierz inną nazwę nowego rozdziału." );
                }else{
                    printChapters();
                    $('#newChapterName').val("NowyRozdzial");
                }
            },
            cache: false
        });
    }

    $(document).ready(function() {
        printChapters();
        $('#addChapter').click(addChapter);
    });
// ]]>
</script>