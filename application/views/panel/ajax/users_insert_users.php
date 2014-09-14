<?php
if(isset($msg)) echo $msg.'<br />';

if ( $isadm ) echo "Lista użytkowników : ";
else echo "Twoje konto : ";

echo '<br />';

foreach( $users as $u ) {
    ?>
<br />
Login <input type="text" size="20" disabled="true" value="<?php echo $u->login; ?>" />
Nowe hasło <input type="password" size="20" value="" onchange="userChange(<?php echo $u->id; ?>,'pwd',this.value)" />
EMail <input type="text" size="25" value="<?php echo $u->email; ?>" onchange="userChange(<?php echo $u->id; ?>,'email',this.value)" />
    <?php
    if($isadm) {
        echo '<input type="checkbox" value="ISADMIN"'.($u->is_admin?'checked="checked"':'').' onclick="userChange('.$u->id.',\'is_admin\',this);" />Administrator';
        echo "<a onclick=\"del_users($u->id);\" style=\"cursor: pointer; margin-left: 10px; background-color: transparent;\"><img src=\"".base_url()."files/images/page/delbutt.gif\" /></a>";
    }
    echo "<br />";
}
if($isadm) {
    echo '<br /><input type="text" id="newuserlogin" name="newuserlogin" size="20" />'
        .' <input type="button" id="newuser" name="newuser" value="Dodaj" onclick="addUser();" />';
}
?>
<br />
