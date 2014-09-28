<div id="works" style="text-align: center">
    <?php
    //var_dump($projects);
    $i = 0;
    foreach ($projects as $project) {
        if( $project->type != 0) continue;
        ?>

        <div class="workItem">
            <?php
            echo img('resources/images/photo/normal/' . $project->firstPicture);
            ?>
            <div class="workItemTitle">
            <?php echo $project->title_pl.' '.anchor('/page/work/'.$project->id,'Read more'); ?>
            </div>
            
        </div>


    <?php } ?>
</div>

<div id="footerWhite" style="margin-top: 30px;">
    
</div>
