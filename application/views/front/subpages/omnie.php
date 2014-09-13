<!--<div class="leftColumn">-->
<?php
$photos = array(
    'O_mnie_Venezia.jpg',
    'Sluby_panienskie-przedstawienie_dyplomowe.jpg',
    'otello.jpg',
    'Egzamin-Gawlika 1965 r.jpg',
    'Most-szaniawskiego, E. Barszczewska.jpg',
    'Pigmalion_3.jpg',
    'Pigmalion_6.jpg',
    'Pigmalion_9.jpg',
    'lord_z_walizki.jpg',
    'Lord_z_walizki_I_Kwiatkowska.jpg',
    'Wodewil_warszawski_4.jpg',
    'Wodewil_warszawski_6.jpg',
    'badz_moja_wdowa.jpg',
    'Warto_bys_wpadl_szopka_jubileuszowa.jpg',
    'tv2.jpg',
    'olek_kalinowski.jpg',
    'Noce_i_dnie.jpg'
);

$titles = array(
    'O mnie',
    'Śluby panienskie - przedstawienie dyplomowe',
    'Desdemona - Otello, J. Jasinski 1966 r.',
    'Egzamin, aut. J.P. Gawlik, 1965 r.',
    'Most, z E. Barszczewską',
    'Pigmalion',
    'Pigmalion',
    'Pigmalion',
    'Lord z walizki',
    'Lord z walizki z I.Kwiatkowską',
    'Wodewil Warszawski z H.Bielicką',
    'Wodewil Warszawski',
    'Bądź moją wdową z L.Wysocką',
    'Warto byś wpadł szopka jubileuszowa 1980 r.',
    'TV 2 - Teatr telewizji dla dzieci',
    'Kino Familijne',
    'Noce i dnie'
);

function insertPhoto($photo, $title, $float = 'none', $m = '0px', $spec = '') {
    echo '<a href="' . base_url('resources/photos/omnie/full/' . $photo) . '" rel="lightbox-max-alissa" title="' . $title . '">';
    echo '<img style="' . $spec . ' float: ' . $float . '; margin: ' . $m . '" alt="Alissa Alicja Wolska" src="' . base_url('resources/photos/omnie/mini/' . $photo) . '" />';
    echo '</a>';
}
?>

<!--</div>-->
<div class="allColumn scrollpane" style="height: 525px;">
    <div style="padding: 0px 10px;">

        <p style="text-align: center">
        <?php insertPhoto($photos[0], $titles[0], 'none', '0px', ' width: 600px;'); ?>   
        </p>
        
        <p style="clear: both; padding: 0px; margin-top: 20px;">
        <?php insertPhoto($photos[1], $titles[1], 'left', '0px 15px 0px 5px'); ?>
            Jestem aktorką, absolwentką Państwowej Wyższej Szkoły Teatralnej im. Aleksandra Zelwerowicza w Warszawie. 
            Opiekunką mojego roku była pani profesor Ryszarda Hanin.
            Bezpośrednio po ukończeniu studiów występowałam w teatrach w Sosnowcu i&nbsp;w Zielonej Górze.
        </p>

        <p style="clear: both;  padding-top: 20px;">
            W sezonie 1965/66 w Teatrze Ziemi Lubuskiej im. L. Kruczkowskiego w Zielonej Górze wystąpiłam m. in. w „Zemście” 
            Aleksandra Fredry /rola Klary, reż. Eugeniusz Aniszczenko/, „Czarującej szewcowej” Federica Garcii Lorki / 
            rola Dziewczyny, reż. Zbigniew Stok /, „Złotym Cielaku” Ilji Ilfa i&nbsp;Eugeniusza Pietrowa /rola Zosi, reż. 
            Zbigniew Kopalko/, „Fizykach” Fredricha Dürrenmatta /rola pielęgniarki Moniki Stettler, reż. Andrzej Makarewicz/, 
            „Otellu” Williama Shakespeare’a /role Desdemony i&nbsp;Bianki, reż. Andrzej Makarewicz/ oraz w „Egzaminie” 
            Jana Pawła Gawlika /rola nauczycielki, Krystyny Chlebowskiej, reż. Zbigniew Stok.
        </p>

        <div style="clear: both; padding-top: 10px;">
<?php insertPhoto($photos[2], $titles[2], 'left', '0px 5px'); ?>
<?php insertPhoto($photos[3], $titles[3], 'left', '0px 5px'); ?>
        </div>


        <p style="clear:both; padding-top: 20px;">
            W tym samym sezonie uczestniczyłam w nagraniach audycji poetyckich Rozgłośni PR w Zielonej Górze. Ponadto wystąpiłam gościnnie w warszawskim Teatrze Rozmaitości w „Ślubach panieńskich” Aleksandra Fredry /rola Anieli, reż. Ireneusz Kanicki/.
        </p>



        <p style="clear: both;">
<?php insertPhoto($photos[4], $titles[4], 'left', '0px 15px 0px 5px', ' width:190px;'); ?>
            Następny sezon to Państwowy Teatr Zagłębia w Sosnowcu z&nbsp;rolami w spektaklach, m. In. „Niech no tylko zakwitną jabłonie” Agnieszki Osieckiej /rola Krysi-traktorzystki, reż. Jerzy Ukleja/, „ Most” Jerzego Szaniawskiego / rola Marysi, reż. Marian Wyrzykowski/, „Pigmalion”  Bernarda  Showa / rola Elizy,  reż. Wiesław Mirecki/ oraz telewizyjne realizacje teatru „Kobra” /reż. Józef Słotwiński/, jak również programy muzyczne TVP Katowice.
        </p>

        <div style="clear: both; padding-top: 10px;">
<?php insertPhoto($photos[5], $titles[5], 'left', '0px 5px', ' width:190px;'); ?>
<?php insertPhoto($photos[6], $titles[6], 'left', '0px 5px', ' width:190px;'); ?>
<?php insertPhoto($photos[7], $titles[7], 'left', '0px 5px', ' width:190px;'); ?>
        </div>

        <p style="clear:both; padding-top: 20px;">
            Potem zaczął się okres warszawski mojej działalności zawodowej; znalazłam się w zespole Teatru „Syrena”, na którego deskach występowałam, m.in. w inscenizacjach „Bujamy wśród gwiazd”/rewia z&nbsp;Lodą Halamą/, „ Lord z&nbsp;walizki” / komedia muzyczna w reż. Zdzisława  Tobiasza, rola Cecylii Cardew/, „Wodewil warszawski” Zdzisława Gozdawy i&nbsp;Wacława Stępnia /reż. Zbigniew Czeski, rola Zosi/, „Bądź moją wdową” Marcela Mithois /reż. Jadwiga Chojnacka, rola Anny Marii, córki Coco/, „Latające dziewczęta” Marca Comolettiego /reż. Kazimierz Brusikiewicz, rola stewardessy Lufthansy/, „Skok do łóżka” farsa Raya Conneya i&nbsp;Johna Chapmana /reż. Kazimierz Brusikiewicz, rola Lucienne Sebastien/, „Tylko u&nbsp;nas” rewia Zdzisława Gozdawy i&nbsp;Wacława Stępnia /reż. Kazimierz Brusikiewicz/, „ Wielki Dodek”- ballada o Adolfie Dymszy /scenariusz Witold Filler i&nbsp;Jonasz Kofta, reż. Witold Filler/, „Dobry wojak Szwejk” Jarosława Haszka /reż. Zbigniew Bogdański, rola służącej pułkownika/, „Madame Sans-Gene”  Antoniego Marianowicza i&nbsp;Janusza Minkiewicza/ reż. Jerzy Gruza/, „Warto byś wpadł , szopka jubileuszowa” /reż. Witold Filler/, „Kłopot z&nbsp;dziewczyną perkusisty” Terence’a  Frisby /reż. Roman Kłosowski /.
        </p>

        <div style="clear: both; padding-top: 10px;">
<?php insertPhoto($photos[8], $titles[8], 'left', '0px 5px'); ?>
<?php insertPhoto($photos[9], $titles[9], 'left', '0px 5px'); ?>
<?php insertPhoto($photos[10], $titles[10], 'left', '0px 5px'); ?>
        </div>
        <div style="clear: both; padding-top: 15px;">  
<?php insertPhoto($photos[11], $titles[11], 'left', '0px 5px'); ?>
<?php insertPhoto($photos[12], $titles[12], 'left', '0px 5px'); ?>
<?php insertPhoto($photos[13], $titles[13], 'left', '0px 5px'); ?>
        </div>

        <p style="clear:both; padding-top: 20px;">
            Kolejny etap mojej pracy teatralnej to Teatr na Targówku, w którym występowałam, m. In. w  „Królowej przedmieścia” według sztuki Konstantego Krumłowskiego w reżyserii  i&nbsp;z choreografią Tadeusza Wiśniewskiego. <br/>
        </p>

        <p>
            <?php insertPhoto($photos[16], $titles[16], 'left', '0px 15px 0px 5px'); ?>
            Występowałam również w licznych filmach, m. in.: „Ktokolwiek wie…” reż. Kazimierz Kutz, „Niedzielne dzieci”, 
            reż. Agnieszka Holland, „Noce i&nbsp;dnie”, reż. Jerzy Antczak, „Czterdziestolatek”, reż. Jerzy Gruza, „07 zgłoś się”, reż. Krzysztof Szmagier, „Rzeka kłamstwa”, reż. Jan Łomnicki, „Dzień wielkiej ryby”, reż. Andrzej Barański, „Na dobre i&nbsp;na złe’, „Psie serce”, a&nbsp;także w filmach dla dzieci, m. in. w „Plastusiowym pamiętniku”(reż. Zofia Ołdak).<br/>
        </p>

        <p style="clear:both; padding-top: 17px;">
            <?php insertPhoto($photos[14], $titles[14], 'left', '0px 15px 0px 5px'); ?>
            W telewizji nagrałam szereg „Wieczorynek” i&nbsp;byłam wróżką w „Bajkowym koncercie życzeń”/ w reżyserii  
            Ireny Sobierajskiej/. W dorobku mam także role w TV Teatrze dla dzieci, 
            m. in.w „Kochanych maleństwach”, „Takich sobie bajeczkach”, „Między nam i&nbsp;książkami” reż. Piotr Friedrich,” „Malarce snów”, reż. Bohdan Radkowski.<br/>
        </p>

        <p style="clear:both; padding-top: 20px;">
            <?php insertPhoto($photos[15], $titles[15], 'left', '0px 15px 0px 5px'); ?>
            Do połowy lat osiemdziesiątych XX wieku, jako aktorka i&nbsp;animatorka działań teatralnych z&nbsp;publicznością dziecięcą, 
            współpracowałam z&nbsp;Kinem Familijnym przy warszawskim Pałacu Kultury i&nbsp;Nauki oraz wprowadzałam dzieci w tajniki pracy aktorskiej w działającym przy Teatrze na Targówku /dziś Teatr Rampa/ Dziecięcym Klubie Miłośników Teatru .<br/>
        </p>

        <p style="clear:both; padding-top: 20px;">
            Obecnie prowadzę Agencję  Artystyczną  „Alissa”, występuję w przedstawieniach teatralnych dla dzieci, jako aktorka uczestniczę również w realizacji krótkich form filmowych dla agencji produkujących na potrzeby - głównie - telewizji. Biorę udział , jako jurorka, w konkursach recytatorskich organizowanych przez Pałac Młodzieży w PKiN  i&nbsp; w zajęciach  teatralnych w praskim Domu Kultury „Świt”.<br/>
        </p>

        <div class="bottommargin">
        </div>

    </div>
</div>

