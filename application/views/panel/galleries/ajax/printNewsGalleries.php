<?php/*

foreach ( $galleries as $g ){
    ?>
    <div class="rdrop" id="gl_<?php echo $g->id ?>">

    <div class="photoTitleDiv">
        <input type="text" size="20" id="gl_nm_<?php echo $g->id; ?>" value="<?php echo $g->title_pl; ?>" onchange="change_gallery_title(this)" />
    </div>

    <a id="dp_<?php echo $g->id; ?>" onclick="del_gallery(this);" class="delButton">
        <img src="<?php echo base_url(); ?>files/images/page/delbutt.gif" />
    </a>

    <div class="editButton"><?php echo anchor('panel/multigalleryedit/text/'.$g->id, 'Tekst'); ?></div>
    <div class="editButton"><?php echo anchor('panel/multigalleryedit/edit/'.$g->id, 'Zdjęcia'); ?></div>

    <br style="clear: both;">

    <div class="photoFileDiv">
        ZDJĘĆ : <?php echo $g->numPhotos; ?>
    </div>

    <br style="clear: both;">
    </div>

<?php
}

 * ?>
 */
?>
