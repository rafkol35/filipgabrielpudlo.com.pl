<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Filip Gabriel Pudło - <?php echo $title; ?></title>

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        
        <?php 
        echo script_tag('resources/scripts/jquery-1.6.2.min.js');
        //echo script_tag('resources/scripts/jquery-1.7.2.min.js');
        
        echo link_tag('resources/styles/f2.css');
        echo link_tag('resources/styles/jquery.jscrollpane.css'); 
        
        //echo script_tag('resources/scripts/jquery.corner.js');
        echo script_tag('resources/scripts/jquery.jscrollpane.min.js');
        echo script_tag('resources/scripts/jquery.mousewheel.js');
        ?>
        
<!--        <script type="text/javascript" src="<?php echo base_url() ?>resources/scripts/jquery-1.10.2.min.js"></script>-->
<!--        <script type="text/javascript" src="<?php echo base_url() ?>resources/scripts/jquery-1.6.2.min.js"></script>-->
        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>resources/scripts/slimbox/css/slimbox2.css" media="screen" />
        <script type="text/javascript" src="<?php echo base_url() ?>resources/scripts/slimbox/js/slimbox2.js"></script>
         
        <script src="http://code.createjs.com/easeljs-0.6.0.min.js"></script>
        
        <script type="text/javascript">
            function menuready() {
                $(".menuitem_on").css('opacity', 0.0);
                $('.menuitem_on').mouseover(function(){ $(this).animate({opacity:1.0},200); });
                $('.menuitem_on').mouseout(function(){ $(this).animate({opacity:0.0},350); });
            }
        </script>

        <script type="text/javascript">
            $(function(){
                $('.scrollpane').jScrollPane({
                     autoReinitialise: true,
                     hideFocus: true
                });
            });
        </script>
        
        <?php
        if(isset($csss)) foreach ( $csss as $css )echo '<link rel="Stylesheet" type="text/css" href="'.base_url()."files/".$css."\" />\n";
        if(isset($jscripts)) foreach ( $jscripts as $js )echo '<script type="text/javascript" src="'.base_url()."resources/scripts/".$js."\"></script>\n";
        if(isset($includeJSs)) foreach ( $includeJSs as $ijs ) include './resources/scripts/includes/'.$ijs;
        ?>
        
    </head>
    <body>
        <div id="all">
            <img class="curtain" src="<?php echo base_url(); ?>resources/images/mainpage/zaslona_lewa.png" style="left: 0px;"/>
            <img class="curtain" src="<?php echo base_url(); ?>resources/images/mainpage/zaslona_prawa.png" style="right: 0px;"/>
            <div id="head">
                <div id="hh">
                    <div id="hh_title">
                        <?php //if ($pageID == 0) { ?>
<!--                        <img class="hht" src="<?php echo base_url(); ?>resources/images/titles/index2.png" style="top: 10px;"/>
                        <img class="hht" src="<?php echo base_url(); ?>resources/images/titles/index1.png" style="margin-left: 30px;" />-->
                        <?php //} else if ($pageID == 1) { ?>
<!--                        <img class="hht" src="<?php echo base_url(); ?>resources/images/titles/mojteatrdladzieci.png" style="top: 10px;"/>
                        <img class="hht" src="<?php echo base_url(); ?>resources/images/titles/mojteatrdladzieci2.png" style="margin-left: 30px;" />-->
                        <?php //} else { ?>
                        
                        <?php
                        $tp = 75;
                        if( $pageID == 0 )
                        {
                            $tp += 7; 
                        }
                        else if( $pageID != 4 && $pageID != 1 ){
                            $tp += 11;
                        }
                        
                        ?>
                        <img class="hht" src="<?php echo base_url().'resources/images/titles/'.$pageNames[$pageID].'.png'; ?>" style="top: <?php echo $tp; ?>px;"/>
                        <?php //} ?>
                    </div>
                </div>
                <div id="hl">
                    <div id="hl_menu">
                        <?php for($p = 0 ; $p < count($pageNames) ; ++$p){ ?>
                        <img class="menuitem_off" src="<?php echo base_url().'resources/images/menuitems/off_'.$pageNames[$p].'.png'; ?>" style="" />
                        <?php }?>
                        
                        <div id="hl_menu_on">
                            <?php for($p = 0 ; $p < count($pageNames) ; ++$p){ 
                            
                            //echo ($p == $pageID ? '' : '<a href="'..'">')
                                    
                            $s = '<img class="'.($p == $pageID ? 'menuitem_choosen' : 'menuitem_on"')
                                    .'" src="'.base_url().'resources/images/menuitems/on_'.$pageNames[$p].'.png" style="" />';
                            
                                    //.($p == $pageID ? '' : '</a>')."\n";
                            
                            if( $p == $pageID )
                            {
                                echo $s."\n";
                            }
                            else
                            {
                                echo anchor('alissa/'.$pageNames[$p] ,$s)."\n";
                            }
                                    
                            }?>
                        
                        </div>
                    </div>
                </div>
            </div>
            <?php if( $pageID != 0 ) { ?>
            <div id="content">
            <?php } else { ?>
                <div style="height: 558px;">
            <?php } ?>
