<h3>Wybierz album</h3>

<div style="border: 2px solid red; margin: 20px 30px; padding: 10px 15px; font-size: 13px; font-weight: bold; background-color: #ffcc00">
    Wielkość okna Pokazu slajdów : 1024 x 346. DO TAKICH ROZMIARÓW BĘDĄ PRZESKALOWYWANE ZDJĘCIA Z WYBRANEGO ALBUMU 
</div>

<select id="acaSelect" style="float:left; <?php if (0) echo 'background-color: red;'; ?>" onchange="assocSlideshowAlbum(this);">
    <?php
    $pageIDOk = false;

    foreach ($albums as $album) {
        if ($album->id === $slieshowalbum_id) {
            echo "<option selected=\"selected\" id=\"op_$album->id\">$album->name</option>";
            $pageIDOk = true;
        } else {
            echo "<option id=\"op_$album->id\">$album->name</option>";
        }
    }

    if ($pageIDOk) {
        echo '<option id="op_-1">BRAK</option>';
    } else {
        echo '<option id="op_-1" selected="selected">BRAK</option>';
    }
    ?>
</select>
<br style="clear:both;" />
<h3>Czas klatki w sek.</h3>

<input id="ssSpeedNumber" type="number" value="<?php echo $slieshowspeed; ?>" onchange="changeSlideShowSpeed();" />
