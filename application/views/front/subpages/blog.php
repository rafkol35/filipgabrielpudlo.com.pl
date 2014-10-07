<?php
//var_dump($posts);

foreach ($posts as $post){
    if( $post->show == 0) continue;
    ?>
<div class="post">
    <h1><?php echo $post->title; ?></h1>
    <h5><?php echo $post->date; ?></h5>
    <p><?php echo $post->desc; ?></p>
</div>
<?php
}
