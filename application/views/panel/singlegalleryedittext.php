<?php
//if ( !$categoryHaveGalery ){
?>
<!--<div class="errorDiv">Galeria jeszcze nie utworzona!</div>
<input class="ieaButton" type="button" id="createGallery" value="CreateGallery" /><br />-->
<!--<hr style="margin: 10px 0px" />-->
<?php  
//var_dump($gallery);

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
    echo "<b>Tekst polski</b><br />";
    echo anchor("/panel/singlegalleryedit/text/$which/en", 'Edycja tekstu angielskiego');
}
else
{
    echo "<b>Tekst angielski</b><br />";
    echo anchor("/panel/singlegalleryedit/text/$which/pl", 'Edycja tekstu polskiego');
}
?>


<textarea id="fullText" name="fullText" style="width: 700px;" rows="40">
<?php 
$t = "desc_$lang";
echo $galeryTexts->$t;
?>
</textarea>
<br />
<input class="ieaButton" style="margin: 0px;" type="button" value="Zapisz" onclick="setText('<?php echo $lang; ?>')" />
