<?php
function getSize($as){
    switch($as){
        case 's20': echo '20 cm/dłuższy bok'; break;
        case 's40': echo '40 cm/dłuższy bok'; break;
        case 's60': echo '60 cm/dłuższy bok '; break;
        case 's80': echo '80 cm/dłuższy bok '; break;
    }
}
function getCvTp($a){
    switch($a){
        case 'passe': echo 'passe-partout + metalowa rama'; break;
        case 'kappa': echo 'kappa + metalowa rama'; break;
        case 'dibond': echo 'dibond + plexi'; break;
    }
}

function getDelTp($a){
    switch($a){
        case 'osobisty': echo 'odbiór osobisty'; break;
        case 'kurier': echo 'przesyłka kurierska'; break;
    }
}
?>

<?php

foreach ( $orders as $o ){ ?>

<div class="odritem">
    <p class="orditemp">
        <a id="do_<?php echo $o->id; ?>" onclick="del_order(<?php echo $o->id; ?>);" style="cursor: pointer; float: right; background-color: transparent;"><img src="<?php echo base_url(); ?>js/delbutt.gif" /></a>
        <img style="float: right; margin-right: 10px;" src="<?php echo base_url(); ?>minis/<?php echo $o->file; ?>" />

    Imię i Nazwisko : <?php echo $o->name; ?><br />
    E-Mail : <?php echo $o->email; ?><br />
    Telefon : <?php echo $o->phone; ?><br />
    <br />
    Nazwa : <?php echo $o->ordname; ?><br />
    Wymiar : <?php getSize( $o->ordsize ); ?><br />
    Oprawa : <?php getCvTp( $o->ordcover ); ?><br />
    Uwagi : <?php echo $o->ordremark; ?><br />
    Sposób odbioru : <?php getDelTp( $o->orddeliv ); ?><br />
    Data : <?php echo $o->date; ?><br />
    </p>
    <div style="clear: both"></div>
</div>

<?php } ?>
