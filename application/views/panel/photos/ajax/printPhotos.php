<?php

if ( !count($photos) )
{
    echo 'W albumie nie ma zdjęć!';
    return;
}

foreach ( $photos as $p ){
    ?>
    <div class="rdrop" id="ft_<?php echo $p->id ?>">

    <div class="photoTitleDiv">
        Tytuł: <input size="25" type="text" id="fde_pl_<?php echo $p->id; ?>" value="<?php echo $p->title_pl; ?>" onchange="change_photo_title(this,'pl')" /><br />
        Title: <input size="25" type="text" id="fde_en_<?php echo $p->id; ?>" value="<?php echo $p->title_en; ?>" onchange="change_photo_title(this,'en')" /><br />
    </div>

    <?php removeButton('del_photo('.$p->id.')','resources/images/page/panel/delbutt.gif'); ?>
<!--    <a id="dp_<?php echo $p->id; ?>" onclick="del_photo(this);" class="delButton">
        <img src="<?php echo base_url(); ?>files/images/page/delbutt.gif" />
    </a>-->

    <hr style="clear: both;"/>

    <img id="gfx_<?php echo $p->id; ?>" class="filemini" style="margin-top: 5px;" src="<?php echo base_url().'resources/images/photo/mini/'.$p->file; ?>" />

    <br />

    <div class="photoFileDiv">
        PLIK: <br /><p id="fl_<?php echo $p->id; ?>" style="margin-top: 5px; display: inline;"><?php echo $p->file; ?></p>
    </div>
    
    <br style="clear: both;">
    </div>

<?php
}
?>