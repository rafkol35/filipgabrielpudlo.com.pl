<?php

foreach ( $works as $f ){
    ?>
    <div class="rdrop" id="ft_<?php echo $f->id ?>">
        PL: <input type="text" id="fde_pl_<?php echo $f->id; ?>" value="<?php echo $f->desc_pl; ?>" onchange="change_desc(this,'pl')" /><br />
        EN: <input type="text" id="fde_en_<?php echo $f->id; ?>" value="<?php echo $f->desc_en; ?>" onchange="change_desc(this,'en')" />
        
    <a id="dp_<?php echo $f->id; ?>" onclick="del_foto(this);" style="cursor: pointer; float: right; background-color: transparent;">
        <img src="<?php echo base_url(); ?>files/images/page/delbutt.gif" />
    </a>

    <img id="gfx_<?php echo $f->id; ?>" class="rdropimg" src="<?php echo base_url().'files/images/thumbs/'.$f->file; ?>" />

    <p id="fl_<?php echo $f->id; ?>" style="margin-top: 5px;">PLIK: <?php echo $f->file; ?></p>
    
    <br style="clear: both;">
    </div>

<?php 
}
?>



