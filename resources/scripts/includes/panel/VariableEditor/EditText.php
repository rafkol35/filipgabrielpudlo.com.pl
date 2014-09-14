<script type="text/javascript">
    // <![CDATA[
    function VEEditText_textChange(url, whatid, id, what, inputid) {
        //console.log(' ' + url + ' ' + whatid + ' ' + id + ' ' + what + ' ' + $("#"+inputid).val() );
        //$this->MChapter->set($_POST['whatID'], $_POST['id'], $_POST['what'], $_POST['value']);

        $.ajax({
            url: "<?php echo site_url(); ?>/panel/" + url,
            type: "post",
            data: {
                whatID: whatid,
                id: id,
                what: what,
                value: $("#" + inputid).val()
            },
            //success: function(data){ console.log(data); },
            cache: false
        });
    }
    function VEEditText_textChangeM(model, whatid, id, what, inputid) {
        //console.log(' ' + model + ' ' + whatid + ' ' + id + ' ' + what + ' ' + $("#"+inputid).val() );
        
        $.ajax({
            url: "<?php echo site_url('/panel/ajax/modify'); ?>",
            type: "post",
            data: {
                model: model,
                whatID: whatid,
                id: id,
                what: what,
                value: $("#" + inputid).val()
            },
            cache: false
        });
    }
    
     function VETinyMCEEditText_textChange(url, whatid, id, what, inputid) {
        //console.log(' ' + url + ' ' + whatid + ' ' + id + ' ' + what + ' ' + $("#"+inputid).val() );
        //$this->MChapter->set($_POST['whatID'], $_POST['id'], $_POST['what'], $_POST['value']);

        //var ed = tinyMCE.get(inputid);
        //console.log('
        $.ajax({
            url: "<?php echo site_url(); ?>/panel/" + url,
            type: "post",
            data: {
                whatID: whatid,
                id: id,
                what: what,
                value: tinyMCE.get(inputid).getContent()
            },
            //success: function(data){ console.log(data); },
            cache: false
        });
    }
    function VETinyMCEEditText_textChangeM(model, whatid, id, what, inputid) {
        //var ed = tinyMCE.get(inputid);
        //console.log(' ' + model + ' ' + whatid + ' ' + id + ' ' + what + ' ' + ed.getContent() );
        
        $.ajax({
            url: "<?php echo site_url('/panel/ajax/modify'); ?>",
            type: "post",
            data: {
                model: model,
                whatID: whatid,
                id: id,
                what: what,
                value: tinyMCE.get(inputid).getContent()
            },
            cache: false
        });
    }
    
    // ]]>
</script>
