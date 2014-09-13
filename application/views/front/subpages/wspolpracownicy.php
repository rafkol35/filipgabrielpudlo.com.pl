<div class="allColumn scrollpane" style="height: 525px;">
    <div style="height: 1000px; padding: 0px 10px;">

        <!--<div class="leftColumn">-->
        <?php
        $photos = array(
            'Edward_Wieczorkiewicz.jpg',
            'Janina_Keszkowska.jpg',
            'Danuta_Brylewska3.jpg',
            'Ewa_Trochim.jpg',
            'Stefan_Poltorak.jpg',
            'Tomasz_Zarod.jpg',
            'Andrzej_Chudy.jpg',
            'Krysia_Powojewska.jpg',
            'Wanda_Fik-Palkowa.jpg',
            
            'Ilona_Kusmierska.jpg',
            'Teresa_Wieczorkiewicz.jpg',
            'Zbigniew_Rymarz.jpg',
            'Piotr_Makarski.jpg',
            
            'Danuta_Brylewska2.jpg'
            
        );

        $titles = array(
            'Edward Wieczorkiewicz',
            'Janina Keszkowska',
            'Danuta Brylewska',
            'Ewa Trochim',
            'Stefan Półtorak',
            'Tomasz Zarod',
            'Andrzej Chudy',
            'Krystyna Powojewska',
            'Wanda Fik-Pałkowa',
            
            'Ilona Kuśmierska',
            'Teresa Wieczorkiewicz',
            'Zbigniew Rymarz',
            'Piotr Makarski',
            
            'Danuta_Brylewska'
            
        );

//    $t = 0;
//    foreach ($photos as $photo) {
//        
        ?>

<!--        <a href="//<?php echo base_url('resources/photos/wspolpracownicy/full/' . $photo); ?>" rel="lightbox-max-alissa" title="<?php echo $titles[$t]; ?>">
            <img alt="alissa" src="//<?php echo base_url('resources/photos/wspolpracownicy/mini/' . $photo); ?>" style="width: 200px;" />
        </a>-->

        <?php

//        ++$t;
//    }

        function insertPhoto($photo, $title, $flt = 'none', $ml = '0px') {
            echo '<div style="width: 190px; float: ' . $flt . '; margin: ' . $ml . '">';
            echo '<a href="' . base_url('resources/photos/wspolpracownicy/full/' . $photo) . '" rel="lightbox-max-alissa" title="' . $title . '">';
            echo '<img style="width: 190px; height: 150px;  alt="Alissa Alicja Wolska" src="' . base_url('resources/photos/wspolpracownicy/mini/' . $photo) . '" />';
            echo '</a>';
            echo '<p style="font-size:10px; margin-top: 0px; text-align: center;">' . $title . '</p>';
            echo '</div>';
        }
        ?>

        <!--</div>-->

        <!--<div class="rightColumn" style="width: 380px">-->
        <div>
            <p>
                Od początku współpracowało z&nbsp;naszym teatrem wielu znakomitych autorów, aktorów, muzyków i&nbsp;scenografów. <br />
                Wśród autorów mogę wymienić, m. in.: Irenę Aleksandrow, Olgę Koszutską, Edwarda Wieczorkiewicza.
            </p>
            
            <div style="padding-top: 10px;">
            <?php insertPhoto($photos[0], $titles[0], 'left', '0px 5px'); ?>
            <?php insertPhoto($photos[13], $titles[13], 'left', '0px 5px'); ?>
            </div>
            
            <p style="clear: both;">
                a wśród aktorów: Janinę Keszkowską, Danutę Brylewską, 
                Ilonę Kuśmierską, Annę Rakowską, Ewę Trochim, Stefana Pułtoraka, Piotra Borutę,
                Edwarda Wieczorkiewicza, Tomasza Zaroda, Andrzeja Chudego i&nbsp;Piotra Makarskiego. 
            </p>

            <div style="padding-top: 10px;">
            <?php insertPhoto($photos[1], $titles[1], 'left', '0px 5px'); ?>
            <?php insertPhoto($photos[2], $titles[2], 'left', '0px 5px'); ?>
            <?php insertPhoto($photos[3], $titles[3], 'left', '0px 5px'); ?>

            <?php insertPhoto($photos[4], $titles[4], 'left', '0px 5px'); ?>
            <?php insertPhoto($photos[5], $titles[5], 'left', '0px 5px'); ?>
            <?php insertPhoto($photos[6], $titles[6], 'left', '0px 5px'); ?>
                
            <?php insertPhoto($photos[9], $titles[9], 'left', '0px 5px'); ?>
            <?php insertPhoto($photos[10], $titles[10], 'left', '0px 5px'); ?>
            <?php insertPhoto($photos[12], $titles[12], 'left', '0px 5px'); ?>
            </div>
            
            <p style="clear: both;">
                Przez lata muzykę komponował Zbigniew Rymarz, twórca telewizyjnego „Teatrzyku Violinek”, 
                aranżował i&nbsp;nagrywał Tadeusz Prejzner. <br />
            </p>
            
            <div style="padding-top: 10px;">
            <?php insertPhoto($photos[11], $titles[11], 'left', '0px 5px'); ?>
            </div>
            
            
            <p style="clear: both;">
                Projekty lalek i&nbsp;ich wykonanie nieodmiennie należały do Krystyny Powojewskiej. <br />
                Scenografię projektowała i&nbsp;własnoręcznie wykonywała wybitna krakowska scenograf Wanda Fik-Pałkowa.
            </p>
            
            <div style="padding-top: 10px;">
            <?php insertPhoto($photos[7], $titles[7], 'left', '0px 5px'); ?>
            <?php insertPhoto($photos[8], $titles[8], 'left', '0px 5px'); ?>
            </div>

        </div>

        <div class="bottommargin">
        </div>

    </div></div>


