<?php
if ( !$categoryHaveGalery ){
?>
<div class="errorDiv">Galeria jeszcze nie utworzona!</div>
<input class="ieaButton" type="button" id="createGallery" value="CreateGallery" /><br />
<hr style="margin: 10px 0px" />
<?php } ?>

<?php
//var_dump ( $gallery );
//var_dump ( $photos );
//var_dump ( $slideSpeed );
?>
<div id="toText" class="ieaButton" style="float: left;"><?php echo anchor('/panel/multigalleryedit/text/'.$galleryID, 'Edycja tekstów'); ?></div>
<br style="clear:both" />
<div id="divDesc">
    <div id="divDesc1">
    Zdjęcia w galerii
    <input class="ieaButton" type="button" id="newPhotoBtn" name="newPhotoBtn" value="Dodaj zdjęcie" />
    </div>
    <div id="divDesc2">Pliki na serwerze

            <div style="display: inline; width: 125px; height: 20px; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;">
                <span id="spanButtonPlaceholder"></span>
            </div>
        
    </div>
</div>

<div id="photosList"></div>
<div id="filesList"></div>
<div id="filesSorter">
    <div id="filesTransDiv">
        <div id="divFileProgressContainer" style="height: 75px; color: orange; font-weight: bold;"></div>
    </div>

    <hr style="margin: 3px 0px;" />

    Prędkość SlideShow'a :
        <input type="text" size="3" id="gl_ss" value="<?php echo $slideSpeed; ?>" onchange="change_gallery_slidespeed(this)" />

    <hr style="margin: 3px 0px;" />
    
    Sortuj pliki wg. : <br />
    Nazwy plików : <input class="ieaButton" type="button" id="sortNameAsc" name="sortNameAsc" value="Rosnąco" />
    <input class="ieaButton" type="button" id="sortNameDesc" name="sortNameDesc" value="Malejąco" /><br />
    Daty dodania : <input class="ieaButton" type="button" id="sortDateAsc" name="sortDateAsc" value="Rosnąco" />
    <input class="ieaButton" type="button" id="sortDateDesc" name="sortDateDesc" value="Malejąco" /><br />
   
    <hr style="margin: 3px 0px;" />

    Pokaż pliki z kategorii : <br />
<?php
    foreach ( $cts as $c ){
        if ( $c->id == 40 ) echo '<hr />';
        echo '<input type="checkbox" class="ctsSel" id="ctsSel_'.$c->id.'" value=cts_'.$c->id.'" '.($c->showFiles?'checked="checked"':'').' /> '.$c->fullText_pl.'<br />';
    }
?>  <br />
    <input class="ieaButton" type="button" id="showNoFiles" name="showNoFiles" value="Odznacz wszystkie" />
    <br />
    <!--input style="cursor: pointer; padding: 1px 5px; margin:0px 0px 10px 10px; border: solid 1px #7FAAFF; background-color: #C5D9FF;" type="button" id="showFilesID" name="showFilesID" value="Pokaż pliki" /-->
    <br />

</div>

<br style="clear: both;" />
