<?php
foreach ( $projects as $g ){
    ?>
    <div class="rdrag2" id="gf_<?php echo $g->id ?>">
    <div id="tx_titl_<?php echo $g->id ?>" class="fileNameDiv"><?php echo $g->title_pl; ?></div>

    <div style="clear: both;"></div>
    </div>
<?php
}
?>
