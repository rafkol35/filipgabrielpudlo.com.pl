<?php
//var_dump($albums);
$gn = 9;
foreach ( $galleries as $g ){
    ++$gn
    ?>
    <div class="rdrop" style="width: 650px;" id="gl_<?php echo $g->id ?>">

    <div class="photoTitleDiv" style="float: left;">
        <div style="float: left;">Tytuł:<input type="text" size="20" id="gl_nm_pl_<?php echo $g->id; ?>" value="<?php echo $g->title_pl; ?>" onchange="change_gallery_title('pl',this)" /></div>
        <div style="float: left; margin-left: 10px;">Title:<input type="text" size="20" id="gl_nm_en_<?php echo $g->id; ?>" value="<?php echo $g->title_en; ?>" onchange="change_gallery_title('en',this)" /></div>
        <div class="editButton" style="float: left; margin-left: 10px;"><?php echo anchor('panel/multigalleryedit/text/'.$g->id, 'Edycja treści'); ?></div>
        </div>

        <br /><br />
        
        <div style="float: left;">
        <p style="float: left;">Album:</p>
        <?php
        echo "<select class=\"alsel\" id=\"alsel_$g->id\" onchange=\"selChange(this)\" style=\"float: left; margin-left: 10px;\">";

            foreach( $albums as $a ){
                if ( $g->album_id == $a->id )echo "<option id=\"s$gn"."_$a->id\" selected=\"selected\">$a->name</option>";
                else echo "<option id=\"s$gn"."_$a->id\">$a->name</option>";
            }

            if ( $g->album_id == -1 )echo "<option id=\"s$gn"."_mj\" selected=\"selected\">BRAK</option>";
            else echo "<option id=\"s$gn"."_mj\">BRAK</option>";

        ?>
    </select>
    <div class="editButton" style="float: left; margin-left: 10px;"><?php echo anchor('panel/albums/editByGalleryID/'.$g->id, 'Edytuj album', array('id'=>"edal_$g->id",'class'=>'edal') ); ?></div>

    
    </div>

    <a id="dp_<?php echo $g->id; ?>" onclick="del_gallery(this);" class="delButton">
        <img src="<?php echo base_url(); ?>files/images/page/delbutt.gif" />
    </a>
    

        

    
    <br style="clear: both;">

    <?php if ($thisIsNews) { ?>

    <div class="photoFileDiv">
        Dodano : <?php echo $g->date; ?>
    </div>

    <?php } else { ?>

<!--    <div class="photoFileDiv">
        ZDJĘĆ : <?php echo $g->numPhotos; ?>
    </div>-->

    <?php } ?>

    
    <div class="showGalleryDiv">
        <input onclick="change_gallery_show(this)" type="checkbox" id="gal_sh_<?php echo $g->id; ?>" class="gfc" <?php echo $g->show ? "checked=\"checked\"" : "" ?> /> Pokaż na stronie
    </div>

    
    <br style="clear: both;">
    </div>

<?php
}
?>