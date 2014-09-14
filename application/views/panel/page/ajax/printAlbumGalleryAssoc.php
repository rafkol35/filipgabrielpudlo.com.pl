<?php 
//var_dump ($agas);
//var_dump ($albums);
?>

<div id="ch_<?php echo $aga->id ?>" class="printChapter" style="width: 200px;">
    <?php //echo $name; ?>
    <?php removeButton('removeAlbumAssoc(' . $aga->id . ')'); ?>
    <?php //editButton(site_url('panel/chapter/index/'.$id)); ?>
    
    <select id="ml_<?php echo $aga->id ?>" style="float:left; <?php if (0) echo 'background-color: red;'; ?>" onchange="assocGalleryAlbum(this);">
                        
        <?php
        $pageIDOk = false;
        
        foreach ($albums as $album) {
            if ($album->id === $aga->album_id) {
                echo "<option selected=\"selected\" id=\"op_$album->id\">$album->name</option>";
                $pageIDOk = true;
            } else {
                echo "<option id=\"op_$album->id\">$album->name</option>";
            }
        }
        
        if( $pageIDOk ){
            echo '<option id="op_-1">BRAK</option>';
        }else{
            echo '<option id="op_-1" selected="selected">BRAK</option>';
        }
        
        ?>
    </select>

    <br />
    
</div>
