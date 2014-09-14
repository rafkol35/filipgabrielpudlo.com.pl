<script type="text/javascript">
// <![CDATA[
var lastSHPermID = -1;

function showHidePerm(id){
    //if ( lastSHPermID != -1 ) $('#usrPerm'+lastSHPermID).css('height','0px');
    //$('#usrPerm'+id).css('height','100px');
    if ( lastSHPermID != -1 ) $('#usrPerm'+lastSHPermID).html('');

    lastSHPermID = id;

    $.ajax({
            url: "<?php echo site_url('panel/users/insertPermissions'); ?>",
            type: "post",
            data: {userid: id},
            success: function(data){
                $('#usrPerm'+id).html(data);
            },
            cache: false
        });
}

function setPerms(which){
    //alert(which);

    if ( $(which).attr('checked') ){
        //alert( $(which).attr('id').substr(7) +" - on");
        $.ajax({
            url: "<?php echo site_url('panel/users/setPerm/'); ?>",
            type: "post",
            data: {
                userid: lastSHPermID,
                which: $(which).attr('id').substr(7),
                val: 1
            },
            //success: function(data){ alert(data); },
            cache: false
        });
    }else{
        //alert( $(which).attr('id').substr(7) +" - off");
        $.ajax({
            url: "<?php echo site_url('panel/users/setPerm'); ?>",
            type: "post",
            data: {
                userid: lastSHPermID,
                which: $(which).attr('id').substr(7),
                val: 0
            },
            //success: function(data){ alert(data); },
            cache: false
        });
    }
}

function changePermission($userID,which,nval){

}

function del_users(uid){
    if ( !confirm('Czy usunąć użytkownika ?') ) return;
    $.ajax({
            url: "<?php echo site_url('panel/users/delUser'); ?>",
            type: "post",
            data: {userid: uid},
            success: function(){ insert_admins(); insert_users(); },
            cache: false
        });
}

function insert_admins(){
    $.ajax({
            url: "<?php echo site_url('panel/users/toHtml/1'); ?>",
            type: "post",
            success: function(data){ $("#admins").html(data); },
            cache: false
        });
}

function insert_users(){
    $.ajax({
            url: "<?php echo site_url('panel/users/toHtml'); ?>",
            type: "post",
            success: function(data){ $("#users").html(data); },
            cache: false
        });
}

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

function addUser(){
    $.ajax({
            url: "<?php echo site_url('panel/users/addUser'); ?>",
            type: "post",
            data: {login: $("#newuserlogin").val()},
            success: function(data){ if(data=='ae') alert('Taki login już istnieje'); else insert_users(); },
            cache: false
        });
}
function addAdmin(){
    $.ajax({
            url: "<?php echo site_url('panel/users/addAdmin'); ?>",
            type: "post",
            data: {login: $("#newadminlogin").val()},
            success: function(data){ if(data=='ae') alert('Taki login już istnieje'); else insert_admins(); },
            cache: false
        });
}


$(document).ready( function() {
    insert_admins();
    insert_users();

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