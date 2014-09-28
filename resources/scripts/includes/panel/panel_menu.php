<?php
function insertMenuAdmin() {
    ?>
    <div id="panelMenu">
        <ul>
            <li class="mmi2">TEKSTY</li> 
            <li class="mi"><?php echo anchor('panel/page/index/apartament', 'Apartament'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/index/okolica', 'Okolica'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/index/atrakcje', 'Atrakcje'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/index/cennik_i_kalendarz', 'Cennik i kalendarz'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/index/galeria', 'Galeria (tekst)'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/index/dojazd', 'Dojazd'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/index/kontakt', 'Kontakt'); ?></li>
            <hr class="mhr" />
            <li class="mmi2">POZOSTAŁE</li> 
            <li class="mi"><?php echo anchor('panel/page/slideshow', 'SlideShow'); ?></li>
            <li class="mi"><?php echo anchor('panel/projects', 'Projekty'); ?></li>
            <li class="mi"><?php echo anchor('panel/albums', 'Albumy'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/gallery', 'Galeria'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/calendar', 'Kalendarz terminów'); ?></li>
            <li class="mi"><?php echo anchor('panel/page/calendar', 'Formularze klijentów'); ?></li>
            <!--<li class="mi"><?php echo anchor('panel/albums', 'Obrazy'); ?></li>-->
            
        </ul>
    </div>

<?php } ?>





