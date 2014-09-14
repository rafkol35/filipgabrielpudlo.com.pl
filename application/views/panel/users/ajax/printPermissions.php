<?php
//var_dump($permissions);
?>

<table border="1" style="margin-left: 10px;">
    <tbody>
        <?php 
        $t = "fullText_$lang";
        foreach( $permissions as $p){
        echo '<tr>';
        echo "<td>".$p->$t."</td><td><input id=\"permCB_$p->name\" class=\"pcb\" onchange=\"setPerms(permCB_$p->name)\" type=\"checkbox\"".($p->havePermission?"checked=\"checked\"":"")." /></td>";
        echo '</tr>';
        } ?>
    </tbody>
</table>


