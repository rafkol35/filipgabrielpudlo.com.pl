<script type="text/javascript">
// <![CDATA[

function userChange(id,wh,newval){
    if ( wh == 'pwd' ){
        if( !confirm('UWAGA! Czy zmieniasz hasło na : ' + newval + ' ?') ) return;
    }
    if ( wh == 'is_admin' ){
        if ( newval.checked ) newval = '1';
        else newval = '0';
    }
    $.ajax({
            url: "<?php echo site_url('panel/users/changeUser'); ?>",
            type: "post",
            data: {
                uid: id,
                what: wh,
                val: newval
            },
            success: function(data){ if(wh=='is_admin') $("#content").html(data); },
            cache: false
    });
}

$(document).ready( function() {
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
});
// ]]>
</script>