<script type="text/javascript">
    // <![CDATA[

    function saveTexts() {
        var edLeft = tinyMCE.get('textleft');
        var edRight = tinyMCE.get('textright');
        $.ajax({
            url: "<?php echo site_url('panel/index/setTextsAbout'); ?>",
            type: "post",
            data: {
                textleft: edLeft.getContent(),
                textright: edRight.getContent()
            },
            success: function () {
                alert("Tekst zmieniony");
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

