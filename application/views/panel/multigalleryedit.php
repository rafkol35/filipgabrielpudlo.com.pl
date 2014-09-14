<?php 
//var_dump( $which );
?>
    <div style="margin: 0px auto; width: 800px;">
        <?php if ( $categoryID == $cts['news']->id ) { ?>
        <div style="font-weight: bold;">Pasek Aktualności: </div>
        <br />
        <input type="radio" id="RnewsautoOn" name="newsauto" value="1" onchange="newAutoOn()" /> Automatycznie <br />
        <input type="radio" id="RnewsautoOff" name="newsauto" value="0" onchange="newsAutoOff()" /> Zdefiniowane <br />

        TekstPL: <input id="newsTextID_pl" style="" size="70" type="text" value="<?php echo $newsText_pl; ?>" onchange="setNewsText('pl',this)">
        <br /><br />
        TekstEN: <input id="newsTextID_en" style="" size="70" type="text" value="<?php echo $newsText_en; ?>" onchange="setNewsText('en',this)">
        <br /><br />
        Prędkość przewijania: <input id="newsScrollSpeedID" style="" size="2" type="text" value="<?php echo $newsScrollSpeed; ?>" onchange="setNewsScrollSpeed(this)" />
        <br /><br />
        <hr />
        <div id="divDesc">Aktualności:
            <input class="ieaButton" type="button" id="createGallery" value="Dodaj aktualność" />
        </div>
        
        <?php } else { ?>

        <div id="divDesc">Podstrony:
            <input class="ieaButton" type="button" id="createGallery" value="Dodaj podstronę" />
        </div>

        <?php } ?>

        <div id="galleriesList" style="width: 700px">
        </div>
        <div id="viewControls" style="margin-top: 10px; text-align: center; width: 700px;">
            <div id="pagesNums" style="height: 20px; margin-bottom: 10px; background-color: #888; padding: 2px 0px; font-size: 15px; font-weight: bold;"></div>
            <input type="text" value="5" id="itemOnPage" name="itemOnPage" size="2" /> Na strone 
            <input class="ieaButton" type="button" id="setItemOnPage" value="Pokaż" />
        </div>

    </div>

    <hr style="margin: 10px 0px;" />

<?php if ( $categoryID != $cts['news']->id ) { ?>

<h4 style="text-decoration: underline; margin-bottom: 10px; display: inline;">Opis galerii : Język <?php echo $lang == 'pl' ? 'polski' : 'angielski'; ?></h4>

<div class="showGalleryDescDiv" style="display: inline;">
    <input style="margin-left:490px;" onclick="change_gallery_showdesc(this)" type="checkbox" id="gal_sh" class="gfc" <?php echo $actCt->showMultiGalleryDesc ? "checked=\"checked\"" : "" ?> /> Pokaż opis na stronie
</div>
<br />

<?php
if ( $lang == 'pl' )
{
    echo anchor("/panel/multigalleryedit/index/$which/en", 'Edycja tekstu angielskiego');
}
else
{
    echo anchor("/panel/multigalleryedit/index/$which/pl", 'Edycja tekstu polskiego');
}
?>

<br />
<textarea id="fullText" name="fullText" style="width: 600px;" rows="20">
<?php 
$t = "desc_$lang";
echo $actCt->$t;
?>
</textarea>
<br />
<input class="ieaButton" style="margin: 0px;" type="button" value="Zapisz" onclick="setText('<?php echo $lang; ?>')" />

<hr style="margin: 10px 0px;" />

<?php } ?>