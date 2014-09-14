<?php
//var_dump($users);
?>

<?php
foreach( $users as $u ) {
    ?>
<br />
Login <input type="text" size="20" disabled="true" value="<?php echo $u->login; ?>" />
Nowe hasło <input type="password" size="20" value="" onchange="userChange(<?php echo $u->id; ?>,'pwd',this.value)" />
EMail <input type="text" size="25" value="<?php echo $u->email; ?>" onchange="userChange(<?php echo $u->id; ?>,'email',this.value)" />
    <?php
        echo "<a onclick=\"del_users($u->id);\" style=\"cursor: pointer; margin-left: 10px; background-color: transparent;\"><img src=\"".base_url()."files/images/page/delbutt.gif\" /></a>";
        if ( !$u->is_admin ){
            echo "<br /><div class=\"ieaButton\" style=\"float:left;\" id=\"showHidePermButton$u->id\" onclick=\"showHidePerm($u->id)\">Edytuj uprawnienia</div>";

            echo "<div id=\"usrPerm$u->id\" style=\"clear: both;\"></div>";
            echo "<br />";

        }
}
//if($isadm) {
//}
?>
<br />

