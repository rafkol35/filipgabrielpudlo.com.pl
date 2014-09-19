<?php

foreach ( $galleries as $g ){
    ?>
    <div class="rdrop" id="gl_<?php echo $g->id ?>">

        <div>
            Typ projektu:
            <input onchange="setProjectsPhotos(<?php echo $g->id; ?>);" style="margin-left: 10px;" type="radio" name="projType_<?php echo $g->id; ?>" value="photos" <?php if ( $g->type == 0 ) echo "checked=\"checked\"" ?> />zdjęcia
            <input onchange="setProjectFilm(<?php echo $g->id; ?>)" style="margin-left: 10px;" type="radio" name="projType_<?php echo $g->id; ?>" value="film" <?php if ( $g->type == 1 ) echo "checked=\"checked\"" ?> />film
        </div>

        <hr style="margin: 5px; clear: both"/>

    <div class="photoTitleDiv">
        PL: <input type="text" size="30" id="gl_nm_pl_<?php echo $g->id; ?>" value="<?php echo $g->title_pl; ?>" onchange="change_gallery_title('pl',this)" /><br />
        EN: <input style="margin-top: 3px;" type="text" size="30" id="gl_nm_en_<?php echo $g->id; ?>" value="<?php echo $g->title_en; ?>" onchange="change_gallery_title('en',this)" />
    </div>

    <a id="dp_<?php echo $g->id; ?>" onclick="del_gallery(this);" class="delButton">
        <img src="<?php echo base_url(); ?>resources/images/page/panel/delbutt.gif" />
    </a>

        <hr style="margin: 5px; clear: both"/>

    <div style="float:left">
    Rok: <input type="text" size="7" id="proj_yr_<?php echo $g->id; ?>" value="<?php echo $g->year; ?>" onchange="change_gallery_year(this)" /><br />
    </div>

    <div class="editButton" style="margin-right: 0px;"><?php echo anchor('panel/project/shortText/'.$g->id, 'Skrótowy tekst'); ?></div>
    <div class="editButton" style="margin-right: 1px;"><?php echo anchor('panel/project/text/'.$g->id, 'Tekst'); ?></div>
    <?php if ( $g->type == 0 ) { ?>
    <div class="editButton" style="margin-right: 1px;"><?php echo anchor('panel/project/photos/'.$g->id, 'Zdjęcia'); ?></div>
    <?php } ?>

<hr style="margin: 5px; clear: both"/>
    
    <?php if ( $g->type == 0 ) { ?>
    <div class="photoFileDiv">
        Dodano : <?php echo $g->date; ?><br />
        ZDJĘĆ : <?php echo $g->numPhotos; ?>
    </div>
    <?php } else { ?>
    YouTubeLink: <input type="text" size="30" id="ytlink_<?php echo $g->id; ?>" value="<?php echo $g->filmlink; ?>" onchange="setProjectFilmLink(this)" /><br />
    FilmWidth: <input type="text" size="5" id="ytwidth_<?php echo $g->id; ?>" value="<?php echo $g->filmwidth; ?>" onchange="setProjectFilmWidht(this)" /><br />
    FilmHeight: <input type="text" size="5" id="ytheight_<?php echo $g->id; ?>" value="<?php echo $g->filmheight; ?>" onchange="setProjectFilmHeight(this)" /><br />
    <?php } ?>

    <hr style="margin: 5px; clear: both"/>

    <div class="showGalleryDiv">
        <input onclick="change_gallery_show(this)" type="checkbox" id="gal_sh_<?php echo $g->id; ?>" class="gfc" <?php echo $g->show ? "checked=\"checked\"" : "" ?> /> Pokaż na stronie
    </div>

    <div class="readMoreDiv">
        <input onclick="change_gallery_readMore(this)" type="checkbox" id="gal_rm_<?php echo $g->id; ?>" class="gfc" <?php echo $g->readMore ? "checked=\"checked\"" : "" ?> /> Pokaż 'czytaj więcej'
    </div>
    
    <br style="clear: both;">
    </div>

<?php
}
?>