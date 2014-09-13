<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Agencja artystyczna Alissa - <?php echo $title; ?></title>

        <?php
        //echo script_tag('resources/scripts/jquery-1.6.2.min.js');
        echo script_tag('resources/scripts/jquery-1.7.2.min.js');

        echo link_tag('resources/styles/podpapugami.css');
        echo link_tag('resources/styles/jquery.jscrollpane.css');

        echo script_tag('resources/scripts/jquery.corner.js');
        echo script_tag('resources/scripts/jquery.jscrollpane.min.js');
        echo script_tag('resources/scripts/jquery.mousewheel.js');
        ?>

        <script type="text/javascript">
            $(function() {
                $('.scrollpane').jScrollPane({});
            });
        </script>

    </head>
    <body>

        <div id="ad1">

            <div class="newHeader">
                asdfasdf
            </div>

            <div id="ad1Div" class="newContent scrollpane">
                
                <p>
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                asdfasdfasdfsadfa <br />
                </p>
                
            </div>
        </div>

    </body>
</html>