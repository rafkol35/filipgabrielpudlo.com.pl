<?php

foreach ( $posts as $g ){
    ?>
    
    <div class="rdrop" id="gl_<?php echo $g->id ?>">

    <div class="photoTitleDiv">
        Tytuł: <input type="text" size="30" id="gl_nm_pl_<?php echo $g->id; ?>" value="<?php echo $g->title; ?>" onchange="change_post_title(this)" /><br />
    </div>

    <a id="dp_<?php echo $g->id; ?>" onclick="del_post(this);" class="delButton">
        <img src="<?php echo base_url(); ?>resources/images/page/panel/delbutt.gif" />
    </a>

        <br style="clear: both"/>

      Dodano : <?php echo $g->date; ?><br />
      
        <br style="clear: both"/>
        
<!--    <div class="editButton" style="float: left; margin-right: 0px;"><?php echo anchor('panel/posts/shortDesc/'.$g->id, 'Skrótowa treść'); ?></div>
    <div class="editButton" style="float: left; margin-right: 1px;"><?php echo anchor('panel/posts/fullDesc/'.$g->id, 'Pełna treść'); ?></div>-->

    <div class="editButton" style="float: left; margin-right: 0px;"><?php echo anchor('panel/posts/edit/'.$g->id, 'Edytuj'); ?></div>
        
    <div class="showGalleryDiv">
        <input onclick="change_post_show(this)" type="checkbox" id="gal_sh_<?php echo $g->id; ?>" class="gfc" <?php echo $g->show ? "checked=\"checked\"" : "" ?> /> Pokaż na stronie
    </div>

    <br style="clear: both;">
    </div>

<?php
}
?>