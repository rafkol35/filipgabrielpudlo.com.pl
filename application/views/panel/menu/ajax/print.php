<?php
//var_dump($menuitems);

function insertSubMenu($pages,$menuitems,$parentID,$level){

    foreach($menuitems[$parentID] as $mi){
        ?>
        <div style="position: relative; left: <?php echo 50*$level; ?>px; background-color: #ccaa33; border: 2px solid #aacc33; margin: 5px; width: 400px; padding: 2px 5px;" id="ft_<?php echo $mi->id ?>">
            <img id="dl_<?php echo $mi->id ?>" onclick="del_menuitem(this);" style="top: 5px; right: 5px; position: absolute; cursor: pointer;" src="<?php echo base_url(); ?>files/images/page/delbutt.gif" />
            
            PL : <input type="text" id="mi_<?php echo $mi->id; ?>" value="<?php echo $mi->text_pl; ?>" onchange="change_text('pl',this)" />        
            EN : <input type="text" id="mi_<?php echo $mi->id; ?>" value="<?php echo $mi->text_en; ?>" onchange="change_text('en',this)" />        
            
            <?php if($mi->id != 9 ) { ?>
            
            <br />
            <br />
            
            <?php
            $pageIDOk = in_array($mi->page_id,$pages);
            ?>
            
            <select id="ml_<?php echo $mi->id ?>" style="float:left; <?php if(0) echo 'background-color: red;'; ?>" onchange="menuitem_newlink(this);">
<!--                <option id="op_BRAK">BRAK</option>-->
                <?php
                foreach($pages as $p) {
                    if( $p->id === $mi->page_id )
                    {
                        echo "<option selected=\"selected\" id=\"op_$p->id\">$p->name</option>";
                        $pageIDOk = true;
                    }
                    else
                    {
                        echo "<option id=\"op_$p->id\">$p->name</option>";
                    }
                }
		?>
            </select>
            
            <?php
            
            ?>
            
            <div id="ac_<?php echo $mi->id ?>" class="ieaButton" onclick="add_menuitem(this);" style="cursor: pointer; float: left;">Dodaj</div>
            
            <?php if($mi->order > 0 ) { ?>
            <div id="mu_<?php echo $mi->id ?>" class="ieaButton" onclick="menuitem_moveup(this);" style="cursor: pointer; float: left;">Do góry</div>
            <?php } else { ?>
            <div class="ieaDisabledButton" style="float: left;">Do góry</div>
            <?php } ?>
            
            <?php if($mi->order < count( $menuitems[$parentID] )-1  ) { ?>
            <div id="md_<?php echo $mi->id ?>" class="ieaButton" onclick="menuitem_movedown(this);" style="cursor: pointer; float: left;">W dół</div>
            <?php } else { ?>
            <div class="ieaDisabledButton" style="float: left;">W dół</div>
            <?php } ?>
            
            <?php } ?>
            
            <div style="clear:both;"></div>
        </div>

        <?php
        if( key_exists($mi->id, $menuitems) ){
            insertSubMenu($pages,$menuitems,$mi->id,$level+1);
        }
    }
}

insertSubMenu($pages,$menuitems,-1,0);

//var_dump($pages);

?>

