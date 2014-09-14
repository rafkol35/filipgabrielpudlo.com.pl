<?php
foreach ( $files as $g ){
    ?>
    <div class="rdrag2" id="gf_<?php echo $g->id ?>">
    <div id="gf_file_<?php echo $g->id ?>" class="fileNameDiv"><?php echo $g->file; ?></div>
    <!--<a id="dg_<?php echo $g->id; ?>" onclick="del_file(<?php echo $g->id; ?>,'<?php echo $g->file; ?>');" style="cursor: pointer; float: right; background-color: transparent;"><img src="<?php echo base_url(); ?>files/images/page/delbutt.gif" /></a>-->    
    <?php removeButton('del_file('.$g->id.')'); ?>
    <img class="filemini" style="" src="<?php echo base_url(); ?>resources/images/photo/mini/<?php echo $g->file; ?>" />
    <br /><br />
    <?php echo $g->date; ?>
    <div style="clear: both;"></div>

    </div>
<?php
}
?>
