<?php
function insertPostCombo($posts,$latestNewNum,$latestNewLink){ ?>
        <select id="lnid_<?php echo $latestNewNum ?>" style="" onchange="assocLastestNewToPost(this);">

        <?php
        $pageIDOk = false;

        foreach ($posts as $post) {
            if ($post->id === $latestNewLink) {
                echo "<option selected=\"selected\" id=\"op_$post->id\">$post->title</option>";
                $pageIDOk = true;
            } else {
                echo "<option id=\"op_$post->id\">$post->title</option>";
            }
        }

        if ($pageIDOk) {
            echo '<option id="op_-1">BRAK</option>';
        } else {
            echo '<option id="op_-1" selected="selected">BRAK</option>';
        }
        ?>
    </select>
<?php } ?>

<h3>Latest News</h3>
<input class="ieaButton" style="margin: 0px;" type="button" value="Zapisz" onclick="saveTexts()" />
Link do bloga : <?php insertPostCombo($posts,1,$homelatest1link); ?>
<textarea id="homelatest1" name="homelatest1" style="width: 500px;" rows="10">
<?php echo $homelatest1; ?>
</textarea>
<br />
Link do bloga : <?php insertPostCombo($posts,2,$homelatest2link); ?>
<textarea id="homelatest2" name="homelatest2" style="width: 500px;" rows="10">
<?php echo $homelatest2; ?>
</textarea>
<br />
Link do bloga : <?php insertPostCombo($posts,3,$homelatest3link); ?>
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
