<?php /*<div id="toText" class="ieaButton" style="float: left;"><?php echo anchor('/panel/multigalleryedit/edit/'.$galleryID, 'Edycja zdjęć'); ?></div>
*/
//if ( $gallery->album_id != -1 ) {
?>

<?php
//var_dump($gallery);
//var_dump($albums);

        echo "<select class=\"alsel\" id=\"alsel_$gallery->id\" onchange=\"selChange(this)\" style=\"float: left; margin-left: 10px;\">";

            foreach( $albums as $a ){
                if ( $gallery->album_id == $a->id )echo "<option id=\"so"."_$a->id\" selected=\"selected\">$a->name</option>";
                else echo "<option id=\"so"."_$a->id\">$a->name</option>";
            }
            if ( $gallery->album_id == -1 ) echo "<option id=\"so"."_mj\" selected=\"selected\">BRAK</option>";
            else echo "<option id=\"so"."_mj\">BRAK</option>";

        ?>
    </select>
    
<div class="editButton" style="float: left; margin-left: 10px;"><?php echo anchor('panel/albums/editByGalleryID/'.$gallery->id, 'Edytuj album', array('id'=>"edal_$gallery->id",'class'=>'edal') ); ?></div>

<br /><br />

<?php
if ( $lang == 'pl' )
{
    echo "<b>Teksty polskie</b><br />";
    echo anchor("/panel/multigalleryedit/text/$galleryID/en", 'Edycja tekstów angielskich');
}
else
{
    echo "<b>Teksty angielskie</b><br />";
    echo anchor("/panel/multigalleryedit/text/$galleryID/pl", 'Edycja tekstu polskich');
}
?>
<?php //} else { ?>
<!--Galeria nie ma albumu!-->
<?php //} ?>
<br style="clear:both" />

<br /><br />

<h3 style="text-decoration: underline; margin-bottom: 10px;">Pełny tekst</h3>
<textarea id="fullText" name="fullText" style="width: 500px;" rows="40">
<?php 
$t = "desc_$lang";
echo $galeryTexts->$t;
?>
</textarea>
<br />
<input class="ieaButton" style="margin: 0px;" type="button" value="Zapisz" onclick="setText('<?php echo $lang; ?>')" />

<hr style="margin: 10px 0px;" />

<h3 style="text-decoration: underline; margin-bottom: 10px;">Wersja skrócona</h3>
<textarea id="shortText" name="shortText" style="width: 500px;" rows="20">
<?php 
$t = "short_desc_$lang";
echo $galeryTexts->$t;
?>
</textarea>
<br />
<input class="ieaButton" style="margin: 0px;" type="button" value="Zapisz" onclick="setShortText('<?php echo $lang; ?>')" />

<!--<input class="ieaButton" style="margin: 0px;" type="button" value="Generuj podgląd" onclick="makeShortPreview()" />-->

<?php /*
<div class="shortGallery">
<img class="shortGalleryLogo" src="<?php base_url()."files/images/works/".($g->logo->file); ?>" />;
<div class="galleryDesc"><b>$g->title_pl</b><br /><br />$g->short_desc_pl<br />".anchor('/iea/index/'.$wia.'/'.$g->id,'>> więcej')."</div>";
<div class=\"galleryDesc\"><b>$g->title_pl</b><br /><br />$g->short_desc_pl<br />".anchor('/iea/index/'.$wia.'/'.$g->id,'>> więcej')."</div>";
</div>
*/
?>

<?php if ($thisIsNews) { ?>

<hr style="margin: 10px 0px;" />

<h3 style="text-decoration: underline; margin-bottom: 10px;">Zajawka</h3>
<textarea id="newShortText" name="newShortText" style="width: 500px;" rows="20">
<?php 
$t = "news_short_desc_$lang";
echo $galeryTexts->$t; ?>
</textarea>
<br />
<input class="ieaButton" style="margin: 0px;" type="button" value="Zapisz" onclick="setNewsShortText('<?php echo $lang; ?>')" />
<!--<input class="ieaButton" style="margin: 0px;" type="button" value="Genreuj podgląd" onclick="makeZajawkaPreview()" />-->

<div id="leftCS">
<div class="sampleAkt">
    <div class="sAd"><div class="sAd2">
        <b><?php //echo $n->title_pl; ?></b><br />
        <?php //echo $n->news_short_desc; ?>
        </div><a style="text-decoration: none; color: #ff3333" href="<?php echo '#';//site_url('/iea/index/news/'.$galleryID); ?>"><span style="text-decoration: none; color: #ff3333">&gt;&gt; czytaj więcej</span></a>
    </div>
</div>
</div>
<?php } ?>

<hr style="margin: 10px 0px;" />
