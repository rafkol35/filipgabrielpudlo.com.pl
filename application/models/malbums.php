<?php
class MAlbums extends CI_Model{

    function getGalleryAlbums(){
        $this->load->model('MAlbumgalleryassoc', 'AGA', TRUE);
        $allACAs = $this->AGA->getAll();
        $retArr = array();
        foreach ( $allACAs as $aca ){
            $this->db->select('*');
            $this->db->where('id',$aca->album_id);
            $alb = current($this->db->get('albums')->result());
            $alb->aga_id = $aca->id;
            $retArr[] = $alb;
        }
        return $retArr;
    }
    
    function getAlbums($chapterID){
        $this->load->model('MAlbumChapterassoc', 'ACA', TRUE);
        $allACAs = $this->ACA->getAll($chapterID);
        $retArr = array();
        foreach ( $allACAs as $aca ){
            $this->db->select('*');
            $this->db->where('id',$aca->album_id);
            $alb = current($this->db->get('albums')->result());
            $alb->aca_id = $aca->id;
            $retArr[] = $alb;
        }
        return $retArr;
    }
    
    function getAllToAGA(){
        $all = $this->getAll();
        $retArr = array();
        foreach ( $all as $a ){
            //$this->db->select('*');
            //$this->db->where('id',$aca->album_id);
            //$alb = current($this->db->get('albums')->result());
            //$alb->aca_id = $aca->id;
            $retArr[] = $a;
        }
        return $retArr;
    }
    
    function getAll($sort='id',$sortType='desc'){
        $this->db->select('*');
        $this->db->order_by($sort,$sortType);
        $retArr = $this->db->get('albums')->result();

        foreach ( $retArr as $g ){
            $this->db->where('album_id', $g->id);
            $this->db->from('photos');
            $g->numPhotos = $this->db->count_all_results();
        
            $this->db->select('galleries.id,galleries.title_pl,categories.fullText_pl');
            $this->db->where('album_id',$g->id);
            $this->db->from('galleries');
            $this->db->join('categories', 'galleries.category_id = categories.id');
            $g->whereUsed = $this->db->get()->result();
        }
        return $retArr;
    }

    function getFull($id){
        $full = array();
        $alb = $this->get($id);
        //$full = $alb;
        //return $full;
        
        //$full['title'] = $alb->name;
        //$full['photos'] = $this->get_photos($id);
        $this->load->model('MPhotos', 'MPhotos', TRUE);
        
        return $this->MPhotos->get_photos($id);
        
        return $full;
    }
    
    function get($id){
        $this->db->select('*');
        $this->db->where('id', $id);
        return current($this->db->get('albums')->result());
    }

    function createAlbumsFromGalleries(){
        $this->db->select('title_pl');
        $galleries =  $this->db->get('galleries')->result();

        foreach( $galleries as $g ){
            $this->addWithName($g->title_pl);
        }
    }

//    function get($galleryID){
//        $this->db->select('*');
//        $this->db->where('', $galleryID);
//        return current($this->db->get('albums')->result());
//    }

    function set($sw,$sv,$w,$v){
        $this->db->where($sw,$sv);
        $this->db->update('albums', array($w=>$v));
    }

    function add(){
        $this->db->insert('albums',array('name'=>'nazwa'));
    }
    function addWithName($name){
        $this->db->insert('albums',array('name'=>$name));
    }
    function del($id){
        $this->db->where('id',$id);
        $this->db->delete('albums');
    }

    function get_photos($id){
        $this->db->select('*');
        $this->db->where('album_id', $id);
        $this->db->order_by('sort', 'asc');
        return $this->db->get('photos')->result();
    }
}
?>