<div class="allColumn scrollpane" style="height: 525px;">
    <div style="height: 3300px; padding: 0px 10px;">

        <?php
        $photos = array(
        );

        
        
//        Jest               Powinno być
//        1. 345 236 - dyr. Katarzyna Kwiecinska
//        2. 212 361 - dyr. Małgorzata Lubańska
//        3. 169 139 - dyr. Edyta Kaczmarczyk
//        4. 236 345 - dyr. Ewa Czarnecka
//        5. 361 212 - dyr. Katarzyna Pernach Brzostek
//        6. 139 24 - dyr. Alina Pierzchalska
//        7. 131 - jest dobrze
//        8. 113 - jest dobrze
//        9. 115 156 - dyr. Mariola Drzewińska
//        10. 91 - jest dobrze
//        11. 156 115 - dyr. Jolanta Skwarek
//        12. 48 222 - dyr. Barbara Barlak
//        13. 24 48 - dyr. Joanna Wojtunik
//        14. 222 169 - dyr. Grażyna Balicka

        $titles = array(
            'Przedszkole nr 345, pani dyrektor Ewa Czarnecka',
            'Przedszkole nr 236, pani dyrektor  Katarzyna Kwiecińska',
            'Przedszkole nr 361, pani dyrektor Małgorzata Lubańska',
            'Przedszkole nr 139, pani dyrektor Edyta Kaczmarczyk',
            'Przedszkole nr 212, pani dyrektor Katarzyna Pernach-Brzostek',
            'Przedszkole nr 24, pani dyrektor Alina Pierzchalska',
            'Przedszkole nr 131, pani dyrektor Edyta Szomko',
            'Przedszkole nr 113, pani dyrektor Elżbieta Pakieła',
            'Przedszkole nr 156, pani dyrektor Mariola Drzewińska',
            'Przedszkole nr 91, pani dyrektor Małgorzta Bajszczak',
            'Przedszkole nr 115, pani dyrektor Jolanta Skwarek',
            'Przedszkole nr 222, pani dyrektor Barbara Barlak',
            'Przedszkole nr 48, pani dyrektor Joanna Wojtunik',
            'Przedszkole nr 169, pani dyrektor Grażyna Balicka',
            
            'Przedszkole nr 235, pani dyrektor Teresa Janek',
            'Fila przedszkola nr 201, pani dyrektor Bogusława Fabisiak-Ziarczyk',
            'Przedszkole nr 95, pani dyrektor Katarzyna Siwik',
            
            
        );

//        $titles = array(
//            'Przedszkole nr 345, pani dyrektor Ewa Czarnecka',
//            'Przedszkole nr 212, pani dyrektor Katarzyna Pernach - Brzostek',
//            'Przedszkole nr 169, pani dyrektor Grażyna Balicka',
//            'Przedszkole nr 236, pani dyrektor Katarzyna Kwiecińska',
//            'Przedszkole nr 361, pani dyrektor Małgorzata Lubańska',
//            'Przedszkole nr 139, pani dyrektor Edyta Kaczmarczyk',
//            'Przedszkole nr 131, pani dyrektor Edyta Szomko',
//            'Przedszkole nr 113, pani dyrektor Elżbieta Pakieła',
//            'Przedszkole nr 115, pani dyrektor Jolanta Skwarek',
//            'Przedszkole nr 91, pani dyrektor Małgorzta Bajszczak',
//            'Przedszkole nr 156, pani dyrektor Mariola Drzewińska',
//            'Przedszkole nr 48, pani dyrektor Joanna Wojtunik',
//            'Przedszkole nr 24, pani dyrektor  Alina Pierzchalska',
//            'Przedszkole nr 222, pani dyrektor Barbara Barlak'
//        );

        function insertPhoto($photo, $title, $flt = 'none', $ml = '0px') {
            echo '<div style="float: ' . $flt . '; margin: ' . $ml . '">';
            echo '<a href="' . base_url('resources/photos/rekomendacje/full/' . $photo) . '" rel="lightbox-max-alissa" title="' . $title . '">';
            echo '<img style="margin-right: 15px; vertical-align: text-top; width: 190px;  alt="Alissa Alicja Wolska" src="' . base_url('resources/photos/rekomendacje/mini/' . $photo) . '" />';
            echo '</a>';
            echo $title;
            echo '</div>';
        }
        ?>

        <p>
            Najlepszą rekomendacją jest dla nas wierna sympatia ze strony wielu warszawskich  przedszkoli, niektóre z nich przedstawiamy poniżej: 
        </p>


        <?php
        for ($i = 31; $i <= 47; ++$i) {
            insertPhoto('alissa_' . $i . '.jpg', $titles[$i - 31], 'none', '10px 0px');
        }
        ?>


    </div>
</div>




