<?php
//var_dump($user);
?>

<h3>Konto : <?php echo $user->login; ?></h3>
<br />
Nowe hasło <input type="password" size="20" value="" onchange="userChange(<?php echo $user->id; ?>,'pwd',this.value)" />
EMail <input type="text" size="25" value="<?php echo $user->email; ?>" onchange="userChange(<?php echo $user->id; ?>,'email',this.value)" />
