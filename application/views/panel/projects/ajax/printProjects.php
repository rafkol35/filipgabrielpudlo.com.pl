<?php

foreach ( $galleries as $g ){
    ?>
    <div class="rdrop" id="gl_<?php echo $g->id ?>">

    <div class="photoTitleDiv">
        Tytuł: <input type="text" size="30" id="gl_nm_pl_<?php echo $g->id; ?>" value="<?php echo $g->title_pl; ?>" onchange="change_gallery_title('pl',this)" /><br />
    </div>

    <a id="dp_<?php echo $g->id; ?>" onclick="del_gallery(this);" class="delButton">
        <img src="<?php echo base_url(); ?>resources/images/page/panel/delbutt.gif" />
    </a>

        <hr style="margin: 5px; clear: both"/>

        <div style="float: left;">
        <p style="float: left;">Album:</p>
                                                                                                                            
        <select id="al_<?php echo $g->id ?>" style="float:left; <?php if (0) echo 'background-color: red;'; ?>" onchange="assocGalleryAlbum(this);">

                <?php
                $pageIDOk = false;

                foreach ($albums as $album) {
                    if ($album->id === $g->album_id) {
                        echo "<option selected=\"selected\" id=\"op_$album->id\">$album->name</option>";
                        $pageIDOk = true;
                    } else {
                        echo "<option id=\"op_$album->id\">$album->name</option>";
                    }
                }

                if ($pageIDOk) {
                    echo '<option id="op_-1">BRAK</option>';
                } else {
                    echo '<option id="op_-1" selected="selected">BRAK</option>';
                }
                ?>
            </select>
        
    <div class="editButton" style="float: left; margin-left: 10px;"><?php echo anchor('panel/albums/editByProjectID/'.$g->id, 'Edytuj album', array('id'=>"edal_$g->id",'class'=>'edal') ); ?></div>

    
    </div>
        
    <div class="editButton" style="margin-right: 0px;"><?php echo anchor('panel/project/shortText/'.$g->id, 'Skrótowy tekst'); ?></div>
    <div class="editButton" style="margin-right: 1px;"><?php echo anchor('panel/project/text/'.$g->id, 'Tekst'); ?></div>
    <?php if ( $g->type == 0 ) { ?>
    <div class="editButton" style="margin-right: 1px;"><?php echo anchor('panel/project/photos/'.$g->id, 'Edycja'); ?></div>
    <?php } ?>

<hr style="margin: 5px; clear: both"/>
    
    <?php if ( $g->type == 0 ) { ?>
    <div class="photoFileDiv">
        Dodano : <?php echo $g->date; ?><br />
        ZDJĘĆ : <?php echo $g->numPhotos; ?>
    </div>
    <?php } else { ?>
    Nie wspieram filmow
    <?php } ?>

    <hr style="margin: 5px; clear: both"/>

    <div class="showGalleryDiv">
        <input onclick="change_gallery_show(this)" type="checkbox" id="gal_sh_<?php echo $g->id; ?>" class="gfc" <?php echo $g->show ? "checked=\"checked\"" : "" ?> /> Pokaż na stronie
    </div>

    <br style="clear: both;">
    </div>

<?php
}
?>