<?php

class MAlbumChapterassoc extends MY_Model{

    function __construct() {
        parent::__construct();
        $this->TABLE = 'albumchapterassoc';
        //$this->load->library('Chapter');
    }
    
    function getAll($chapterID){
        $this->db->select('*');
        $this->db->where('chapter_id',$chapterID);
        $this->db->order_by('sort','asc');
        return $this->db->get($this->TABLE)->result();
    }
    
    //function getTitle($id){
      //  return $this->get('id',$id,true,'title');
    //}
    
//    function getChapters($id){
//        //return new Chapter();
//        
//        //$pageID = $this->get('id', $id, true, 'id');
//        //return $pageID;
//        
//        $this->load->model('MChapter','MChapter',TRUE);
//        return $this->MChapter->getChapters($id);
//    }
    
    //const TABLE = 'texts';
    
//    function get($name,$lang){
//        $this->db->select($lang);
//        $this->db->from($this->TABLE);
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
//    
//    function img($name,$lang){
//        return base_url( 'resources/images/'.self::get($name,$lang) );
//    }
//    
//    function imgSrc($name,$lang){
//        return 'src="'.self::img($name,$lang).'"';
//    }

        
}
