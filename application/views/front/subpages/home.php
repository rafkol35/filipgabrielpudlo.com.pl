<?php
var_dump($films);
//var_dump($latestNews);
function insertLatestNew($latestNew){
    if( $latestNew->pl !== '' ) { ?>
    <div class="latestNew">
        <?php echo $latestNew->pl; ?>
        <?php 
        if( $latestNew->en !== '-1' ){
            echo anchor('page/blog#post'.$latestNew->en, 'Read More');
        }
        ?>
    </div>
<?php }} ?>

<?php 
function getRandomFilmLink($films){
    $numberOfAllIncidences = 0;
    foreach( $films as $film ){
         $numberOfAllIncidences += $film->incidence;
    }
    //var_dump($numberOfAllIncidences);
    $f = rand(1, $numberOfAllIncidences);
    //var_dump($f);
    //ktory to film...
    $inc = 0;
    foreach( $films as $film ){
         $inc += $film->incidence;
         if( $f <= $inc ) return $film->file;
    }
    return 'cos poszlo nie tak...';
}
?>

<?php 
//echo getRandomFilmLink($films);
?>

<div style="text-align: center;">
    <video width="950" height="534" autoplay loop>
        <source src="<?php
        $f = rand(2, 3);
        echo base_url('resources/'.  getRandomFilmLink($films))
        ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>

<div id="footerBlack">
    <b>LATEST NEWS</b>
    <?php insertLatestNew( $latestNews[1] ); ?>
    <?php insertLatestNew( $latestNews[2] ); ?>
    <?php insertLatestNew( $latestNews[3] ); ?>    
</div>
