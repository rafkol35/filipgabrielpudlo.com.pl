<?php
class MPosts extends MY_Model{
    
    function __construct() {
        parent::__construct();
        $this->TABLE = "posts";
    }
    
    function add(){
        parent::add(array('title'=>'tytuł','desc'=>'Tresc','short_desc'=>'Skrocona tresc'));
    }
    
    
}
