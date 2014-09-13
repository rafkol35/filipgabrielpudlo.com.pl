    <?php
    $photos = array(
        'teatr_1.jpg',
        'Jolanta Gal Michalewicz.jpg',
        'Zbigniew Rymarz.jpg',
        //'E.Trochim i T.Zarod.jpg',
        'Ewa_Trochim.jpg',
        'E.Trochim i T.Zarod 2.jpg',
        'Bohaterowie.jpg'
    );

    $titles = array(
        'foto_1',
        'Jolanta Gall Michalewicz',
        'Alicja Wolska i Zbigniew Rymarz',
        //'E.Trochim i T.Zarod',
        'Ewa Trochim',
        'E.Trochim i T.Zarod',
        'Bohaterowie'
    );

    function insertPhoto($photo,$title,$flt='none',$ml='0px', $spec = ''){
        echo '<a href="'.base_url('resources/photos/full/'.$photo).'" rel="lightbox-max-alissa" title="'.$title.'">';
        echo '<img style="' . $spec . ' float: '.$flt.'; margin: '.$ml.'" alt="alissa" src="'.base_url('resources/photos/mini/'.$photo).'" />';
        echo '</a>';
    }
    
//    $t = 0;
//    foreach ($photos as $photo) {
//        ?>

<!--        <a href="//<?php //echo base_url('resources/photos/full/' . $photo); ?>" rel="lightbox-max-alissa" title="<?php //echo $titles[$t]; ?>">
            <img alt="alissa" src="//<?php //echo base_url('resources/photos/mini/' . $photo); ?>" />
        </a>-->

        <?php
//        ++$t;
//    }
    ?>

<div class="allColumn scrollpane" style="height: 525px;">
    <div style="height: 1000px; padding: 0px 10px;">
        
        <p style="text-align: left;">
        <?php insertPhoto($photos[0], $titles[0], 'left', '0px', ' width: 600px;'); ?><br />        
        </p>
           
        <div style="clear: both; padding-top: 20px;">
      <div style="clear: both; float: left; width: 215px;">
          
            <?php insertPhoto($photos[1], $titles[1], 'left', '0px 15px 15px 0px', 'width: 190px;' ); ?><br />
            <?php insertPhoto($photos[2], $titles[2], 'left', '0px 15px 15px 0px', 'width: 190px;'); ?><br />
            
            
          </div>
      
        <div style="float: right; width: 400px;">
            <p style="margin: 0px; padding: 0px;">W ramach Agencji Artystycznej „Alissa” od 1991 roku prowadzę teatr, łączący w sobie pracę aktorów z&nbsp;lalką i&nbsp;występy w żywym planie. Nasz teatr zajmuje się przygotowywaniem i&nbsp;wystawianiem autorskich przedstawień dla najmłodszych widzów. Od lat jeździmy z&nbsp;naszymi programami do dzieci: do przedszkoli, szkół, ośrodków i&nbsp;domów kultury, i&nbsp;wszędzie tam, gdzie są dzieci lubiące teatr, albo dopiero chcące go poznać. W takiej działalności się specjalizujemy i&nbsp;taki teatr bardzo lubimy tworzyć. </p>
            <p>Nasz teatr kontynuuje sposób propagowania kultury teatralnej, opracowany i&nbsp;popularyzowany przez znaną i&nbsp;uznaną w środowisku Jolantę Gall-Michalewicz oraz nieocenionego i&nbsp;oddanego sprawie  teatru  kompozytora i&nbsp;pianistę Zbigniewa Rymarza. Oboje oni byli twórcami, cieszącego się w przeszłości niezwykłą popularnością, teatrzyku  „Wiercipięta”. </p>
            <p>Nasze kameralne przedstawienia są oparte na pracy lalkarzy oraz aktorów żywego planu. Obieramy różne formy po to, by w sposób atrakcyjny dla dziecięcego odbiorcy przekazywać ciekawe, absorbujące ich uwagę opowieści. W inscenizowanych przez nas bajkach chodzi nie tylko o zabawę,  ale również o  ważne – choć często drobne – sprawy, którymi dzieci żyją na co dzień.	  </p>
          </div>
      
            <div style="clear: both; padding-top: 20px;">
                <?php insertPhoto($photos[3], $titles[3], 'left', '0px 15px 15px 0px', 'width: 190px; height: 142px;'); ?>
                <?php insertPhoto($photos[4], $titles[4], 'left', '0px 15px 15px 0px', 'width: 190px;'); ?>
                <?php insertPhoto($photos[5], $titles[5], 'left', '0px 15px 15px 0px', 'width: 190px;'); ?>
            </div>
            
</div>
</div>
