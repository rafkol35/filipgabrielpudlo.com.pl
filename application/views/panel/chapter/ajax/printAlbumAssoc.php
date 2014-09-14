<div id="ch_<?php echo $id ?>" class="printChapter" style="width: 200px;">
    <?php echo $name; ?>
    <?php removeButton('removeChapterAssoc(' . $aca_id . ')'); ?>
    <?php //editButton(site_url('panel/chapter/index/'.$id)); ?>
    
    <select id="ml_<?php echo $mi->id ?>" style="float:left; <?php if (0) echo 'background-color: red;'; ?>" onchange="menuitem_newlink(this);">
        <!--                <option id="op_BRAK">BRAK</option>-->
        <?php
        $pageIDOk = false;
        
        foreach ($albums as $album) {
            if ($album->id === $album_id) {
                echo "<option selected=\"selected\" id=\"op_$p->id\">$p->name</option>";
                $pageIDOk = true;
            } else {
                echo "<option id=\"op_$p->id\">$p->name</option>";
            }
        }
        
        if( $pageIDOk ){
            echo '<option id="op_-1">BRAK</option>';
        }else{
            echo '<option id="op_-1" selected="selected">BRAK</option>';
        }
        
        ?>
    </select>

</div>
