<?php
class MTexts extends MY_Model{

     function __construct() {
        parent::__construct();
        $this->TABLE = 'texts';
    }
    
//    function getText($name,$lang){
//        $this->db->select($lang);
//        $this->db->from(self::TABLE);
//        $this->db->where('name', $name);
//        $res = $this->db->get()->result();
//        if( count($res) == 1)
//            return current($res)->$lang;
//        else
//        {
//            return -1;
//        }
//    }
    
//    function set($name,$lang,$val){
//        $this->db->where('name',$name);
//        $this->db->update(self::TABLE, array($lang=>$val));
//    }
    
    function img($name,$lang){
        return base_url( 'resources/images/'.$this->get('name',$name,true,$lang) );
    }
    
    function imgSrc($name,$lang){
        return 'src="'.$this->img($name,$lang).'"';
    }

        
}

