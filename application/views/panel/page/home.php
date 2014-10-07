<h3>Latest News</h3>
<input class="ieaButton" style="margin: 0px;" type="button" value="Zapisz" onclick="saveTexts()" />
<textarea id="homelatest1" name="homelatest1" style="width: 500px;" rows="10">
<?php echo $homelatest1; ?>
</textarea>
<br />
<textarea id="homelatest2" name="homelatest2" style="width: 500px;" rows="10">
<?php echo $homelatest2; ?>
</textarea>
<br />
<textarea id="homelatest3" name="homelatest3" style="width: 500px;" rows="10">
<?php echo $homelatest3; ?>
</textarea>
<br />

<h3>Filmy</h3>
<table>
    <thead>
        <th>Plik</th>
        <th>Częstość</th>
</thead>
<?php

 foreach ($mp4s as $file) {
    echo '<tr>';
    echo '<td>'.$file->file.'</td>';
    ?>
        <td><input type="text" size="1" value="<?php echo $file->incidence; ?>" onchange="changeFilmIncidence(<?php echo '\''.$file->file.'\'';?>,this)" /></td>
   <?php
   echo '</tr>';
}
?>
    
</table>
