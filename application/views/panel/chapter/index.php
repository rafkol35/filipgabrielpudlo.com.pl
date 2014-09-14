<?php
$EditTextTitle->html();
$EditTextText->html();

//var_dump($albums);

?>
<h3>Skojarzony Album</h3>

    <select id="acaSelect" style="float:left; <?php if (0) echo 'background-color: red;'; ?>" onchange="assocAlbum(this);">
        <!--                <option id="op_BRAK">BRAK</option>-->
        <?php
         $pageIDOk = false;
         
        foreach ($albums as $album) {
            if ($album->id === $album_id) {
                echo "<option selected=\"selected\" id=\"op_$album->id\">$album->name</option>";
                $pageIDOk = true;
            } else {
                echo "<option id=\"op_$album->id\">$album->name</option>";
            }
        }
        
        if( $pageIDOk ){
            echo '<option id="op_-1">BRAK</option>';
        }else{
            echo '<option id="op_-1" selected="selected">BRAK</option>';
        }
         
        ?>
    </select>

<br />
<!--asdf-->
<?php
//    echo $this->calendar->generate();
?>

<!--<input class="ieaButton" type="button" id="editAssocAlbum" name="editAssocAlbum" value="Edytuj album" />-->

<!--<hr />-->

<!--<h3>Albumy</h3>
<input class="ieaButton" type="button" id="addAlbum" value="Dodaj album" /><br />
<div id="albumsList" style="width: 500px; height: 300px;">
</div>

<br style="clear: both;"/>-->
