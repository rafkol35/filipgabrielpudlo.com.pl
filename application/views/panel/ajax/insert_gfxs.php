<?php

$aaa = 0;
foreach ( $gfxs as $g ){
    ?>
    <div class="rdrag2" id="gf_<?php echo $aaa ?>">
    <div id="gf_file_<?php echo $aaa ?>"><?php echo $g; ?></div>
    <a id="dg_<?php echo $aaa; ?>" onclick="del_gfx('<?php echo $g; ?>');" style="cursor: pointer; float: right; background-color: transparent;"><img src="<?php echo base_url(); ?>files/images/page/delbutt.gif" /></a>
    <img style="float: right; margin-right: 5px" src="<?php echo base_url(); ?>files/images/thumbs/<?php echo $g; ?>" />
    <div style="clear: both;"></div>
    </div>

<?php
$aaa++;
}
?>
