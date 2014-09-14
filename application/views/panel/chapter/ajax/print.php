<div id="ch_<?php echo $id ?>" class="printChapter">
    <?php echo $name; ?>
    <?php removeButton('removeChapter('.$id.')'); ?>
    <?php editButton(site_url('panel/chapter/index/'.$id)); ?>
</div>