<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class AAA {

    public function __construct() {
        $this->i = 5;
    }

    function html(){
        echo 'AAA : ',$this->i,'<br />';
    }
    
    private $i;
}

