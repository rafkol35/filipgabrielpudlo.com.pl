
<p style="background-color: red">
<?php
echo anchor('panel/galleries/', '<< | POWÓT | >>');

//var_dump($photos);

?>
</p>

<input style="margin:10px 0px 10px 10px;" type="button" id="nnb" name="nnb" value="Dodaj zdjęcie" />

<div id="tooverflow">
    <div id="filesSort">
        <input style="margin:10px 0px 10px 10px;" type="button" id="sortNameAsc" name="sortNameAsc" value="NameUp" />
        <input style="margin:10px 0px 10px 10px;" type="button" id="sortNameDesc" name="sortNameDesc" value="NameDown" />
        <input style="margin:10px 0px 10px 10px;" type="button" id="sortDateAsc" name="sortDateAsc" value="DateUp" />
        <input style="margin:10px 0px 10px 10px;" type="button" id="sortDateDesc" name="sortDateDesc" value="DateDown" />
    </div>
    <br style="clear: both;" />

    
    <div id="photosList"></div>
    <div id="filesList"></div>
    <br style="clear: both;" />
</div>

<hr style="clear:both;"/>

<h1 id="textTitle"></h1>


<?php /*
<textarea name="textcontent" style="width: 700px;" rows="20">
<?php echo $gallery->title_pl; ?>
</textarea>
*/
?>

<input type="button" value="Zapisz" onclick="modify()" />


