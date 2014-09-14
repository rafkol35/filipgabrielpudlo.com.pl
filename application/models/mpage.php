<?php

class MPage extends MY_Model{

    function __construct() {
        parent::__construct();
        $this->TABLE = 'pages';
        //$this->load->library('Chapter');
    }
    
    function getTitle($id){
        return $this->get('id',$id,true,'title');
    }
    
    function getChapters($id){
        //return new Chapter();
        
        //$pageID = $this->get('id', $id, true, 'id');
        //return $pageID;
        
        $this->load->model('MChapter','MChapter',TRUE);
        return $this->MChapter->getChapters($id);
    }
    
    function getChaptersFull($id,$lang){
        $this->load->model('MTexts','TXT',TRUE);
        $this->load->model('MAlbums','ALB',TRUE);
        
        $chts = $this->getChapters($id);
        //return $chts;
        $chapters = array();
        foreach( $chts as $c ){
            //$title = ;
            //$chapter->title = $title->$lang;
            //$chapter->text = $this->TXT->get('name',$c->text_name);
            $chapters[$c->name]['title'] = $this->TXT->get('name',$c->title_name)->$lang;
            $chapters[$c->name]['text'] = $this->TXT->get('name',$c->text_name)->$lang;
            
            if( $c->album_id != -1 ){
                $chapters[$c->name]['albumName'] = $this->ALB->get($c->album_id)->name;
                $chapters[$c->name]['album'] = $this->ALB->getFull($c->album_id);
            }
            
        }
        return $chapters;
    }
    
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
    
    function set($name,$lang,$val){
        $this->db->where('name',$name);
        $this->db->update(self::TABLE, array($lang=>$val));
    }
    
    function img($name,$lang){
        return base_url( 'resources/images/'.self::get($name,$lang) );
    }
    
    function imgSrc($name,$lang){
        return 'src="'.self::img($name,$lang).'"';
    }

        
}
