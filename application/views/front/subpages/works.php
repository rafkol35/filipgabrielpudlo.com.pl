<div id="works" style="text-align: center">
    <?php
    //var_dump($projects);
    $i = 0;
    foreach ($projects as $project) {
        ?>

        <div class="workItem">
            <?php
            echo img('resources/images/photo/normal/' . $project->firstPicture);
            ?>
            <br />
            <?php echo $project->title_pl.' '.anchor('','Read more'); ?>
        </div>


    <?php } ?>
</div>


