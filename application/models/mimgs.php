<?php

class MImgs extends MTexts{

    const TABLE = 'texts';
    
    function get($name,$lang){
        $this->db->select($lang);
        $this->db->from(self::TABLE);
        $this->db->where('name', $name);
        $_r = current($this->db->get()->result());
        return $_r->val;
    }
}
?>
