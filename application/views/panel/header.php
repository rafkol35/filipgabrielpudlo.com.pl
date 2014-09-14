<?php
include_once './resources/scripts/includes/panel/panel_menu.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title><?php echo base_url(); ?> - Panel Administracyjny - <?php echo $title; ?></title>

        <?php
        echo link_tag('resources/styles/panel.css');
        echo script_tag('resources/scripts/jquery-1.10.2.min.js');
        echo script_tag('resources/scripts/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.min.js');
        echo script_tag('resources/scripts/jquery-ui-1.10.4.custom/js/jquery.ui.datepicker-pl.js');
        echo link_tag('resources/scripts/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css');
        echo script_tag('resources/scripts/tinymce/tinymce.min.js');
        
        if(isset($styles)) foreach ( $styles as $st )echo '<link rel="Stylesheet" type="text/css" href="'.base_url()."resources/styles/".$st."\" />\n";
        if(isset($jscripts)) foreach ( $jscripts as $js )echo '<script type="text/javascript" src="'.base_url()."resources/scripts/".$js."\"></script>\n";
        ?>
        <?php
        if(isset($innerJSs)) foreach ( $innerJSs as $ijs )include './resources/scripts/includes/'.$ijs;
        ?>
    </head>
    <body>
        <div id="container">
            <?php if ($this->session->userdata('is_admin')) {
                insertMenuAdmin();
            } else {
                insertMenuAdmin();
                //insertMenuNormalUser($perms);
            }
            ?>


            <div style="clear: both;">
            </div>
            <div id="content">
                <div id="logOutDiv" class="ieaButton" style="float: right;"><?php echo anchor('/page/logout', 'Wyloguj'); ?></div>
                <div id="helpDiv" class="ieaButton" style="float: right;"><?php echo anchor('/panel/index', 'Pomoc'); ?></div>

                <!--<div id="pagesEdit" class="ieaButton" style="float: right;"><?php echo anchor('/panel/pages', 'Strony'); ?></div>-->
                <!--<div id="menuEdit" class="ieaButton" style="float: right;"><?php echo anchor('/panel/menu', 'Menu'); ?></div>-->
                
                <?php if ($this->session->userdata('is_admin')) { ?>
                    <div id="userDiv" class="ieaButton" style="float: right;"><?php echo anchor('/panel/users/adminAll/', 'Użytkownicy'); ?></div>
                <?php } else { ?>
                    <div id="userDiv" class="ieaButton" style="float: right;"><?php echo anchor('/panel/users/myAccount/'.$this->session->userdata('uid'), 'Moje konto'); ?></div>
                <?php } ?>
                <h2 style="text-decoration: underline;"><?php echo $title; ?></h2>
                <h5 style="margin-top: 5px;"><?php echo base_url(); ?> - Panel Administracyjny</h5>
                <hr style="margin: 10px 0px" />