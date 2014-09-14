<?php

//var_dump($albums);

foreach ( $albums as $g ){
    ?>
    <div class="rdrop" style="cursor: auto;" id="gl_<?php echo $g->id ?>">

    <div class="photoTitleDiv">
        <input type="text" size="30" id="gl_nm_pl_<?php echo $g->id; ?>" value="<?php echo $g->name; ?>" onchange="change_album_name(this)" /><br />
    </div>

    <?php removeButton('del_album('.$g->id.')'); ?>

    <div class="editButton"><?php echo anchor('panel/albums/edit/'.$g->id, 'Zdjęcia'); ?></div>

    <br style="clear: both;">

    <div class="photoFileDiv">
        UTWORZONY: <?php echo $g->date; ?> | ZDJĘĆ: <?php echo $g->numPhotos; ?>
    </div>

    <br style="clear: both;">
    <!--Dołączony do : <br />-->
        <?php
//        $i = 1;
//        foreach ( $g->whereUsed as $w ){
////            var_dump( $w );
////            echo $i++.") ". anchor ( 'panel/albums/editByGalleryID/', $w->fullText_pl.'/'.$w->title_pl );
//            echo $i++.") ".$w->fullText_pl.'/'.$w->title_pl.'<br />';
//        }
        ?>
    </div>

<?php
}
?>