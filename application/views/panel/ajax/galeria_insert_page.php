<?php

foreach ( $gfoty as $f ){
    ?>
    <div class="rdrop" style="cursor: move; background-color: #ccaa33; border: 2px solid #aacc33; margin: 5px auto; width: 350px; padding: 2px 5px;" id="ft_<?php echo $f->id ?>">
        
        <input style="" type="text" id="fde_<?php echo $f->id; ?>" value="<?php echo $f->desc; ?>" onchange="change_desc(this)" />
        
    <?php //echo $f->id.' '.$f->desc.' '.$f->sort; ?>

    <a id="dp_<?php echo $f->id; ?>" onclick="del_foto(this);" style="cursor: pointer; float: right; background-color: transparent;"><img src="<?php echo base_url(); ?>js/delbutt.gif" /></a>
    <img id="gfx_<?php echo $f->id; ?>" src="<?php echo base_url().'fotogaleria/thumbs/'.$f->file; ?>" style="width: 40px; height: 40px; float: right; margin-right: 10px;" />

    <div id="fl_<?php echo $f->id; ?>" style=""><?php echo $f->file; ?></div>

    <br style="clear: both;">
    </div>

<?php
}
?>

<div id="navg" style="width: 80%; cursor: auto; margin: 10px 20px; background-color: #8a3; padding: 3px 0px; font-size: 12px;">

<?php
    for ( $i = 1 ; $i <= $is ; ++$i ){
    echo "<a onclick=\"show_gallery_page(".($i-1).")\"; style=\"cursor: pointer; margin: 0px 5px;\">$i</a>";
    }
    ?>
</div>

