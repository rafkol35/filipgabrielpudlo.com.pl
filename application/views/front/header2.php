<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Filip Gabriel Pudło - <?php echo $title; ?></title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
        <?php 
        echo script_tag('resources/scripts/jquery-1.6.2.min.js');
        
        echo link_tag('resources/styles/fgp.css');
        
        //echo script_tag('resources/scripts/jquery.corner.js');
        //echo script_tag('resources/scripts/jquery.jscrollpane.min.js');
        //echo script_tag('resources/scripts/jquery.mousewheel.js');
        ?>
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/scripts/slimbox/css/slimbox2.css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>resources/scripts/slimbox/js/slimbox2.js"></script>
        
        <?php
        if(isset($csss)) foreach ( $csss as $css )echo '<link rel="Stylesheet" type="text/css" href="'.base_url()."files/".$css."\" />\n";
        if(isset($jscripts)) foreach ( $jscripts as $js )echo '<script type="text/javascript" src="'.base_url()."resources/scripts/".$js."\"></script>\n";
        if(isset($includeJSs)) foreach ( $includeJSs as $ijs ) include './resources/scripts/includes/'.$ijs;
        ?>
        
    </head>
    <body>
        <div id="all">
            <div id="head">
                
                <?php echo img('resources/images/page/filip_white.png'); ?>
                
                <div id="menu">
                    <?php 
                    $propOff = array(
                        'class' => 'menuItemOff'
                    );
                    $propOn = array(
                        'class' => 'menuItemOn'
                    );
                    
                    function insertMenuItem($pageID,$prop,$img,$link='') {
                        $prop['src'] = 'resources/images/page/'.$img;
                        
                        if($pageID === $link){
                            $prop['class'] = 'menuItemChoosen';
                            echo img($prop);
                            return;
                        }
                        
                        if( $link !== '' )
                            echo anchor($link,img($prop));
                        else
                            echo img($prop);
}
?>
                    <div id="menuOff">
                        <?php
                        insertMenuItem($pageID,$propOff,'home_off.png');
                        
                        echo img('resources/images/page/lamane.png');

                        insertMenuItem($pageID,$propOff,'works_off.png');

                        echo img('resources/images/page/lamane.png');

                        insertMenuItem($pageID,$propOff,'about_off.png');
                        
                        echo img('resources/images/page/lamane.png');

                        insertMenuItem($pageID,$propOff,'contact_off.png');
                        
                        echo img('resources/images/page/lamane.png');

                        insertMenuItem($pageID,$propOff,'blog_off.png');
                        
                        ?>
                    </div>
                    <div id="menuOn">
                        <?php
                        insertMenuItem($pageID,$propOn,'home_on.png', 'home');
                        
                        echo img('resources/images/page/lamane.png');

                        insertMenuItem($pageID,$propOn,'works_on.png', 'works');

                        echo img('resources/images/page/lamane.png');

                        insertMenuItem($pageID,$propOn,'about_on.png', 'about');

                        echo img('resources/images/page/lamane.png');

                        insertMenuItem($pageID,$propOn,'contact_on.png', 'contact');

                        echo img('resources/images/page/lamane.png');

                        insertMenuItem($pageID,$propOn,'blog_on.png', 'blog');
                        ?>
                    </div>
                </div>
                
            </div>