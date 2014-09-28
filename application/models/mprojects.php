<?php
class MProjects extends CI_Model{

    function getAllShortByLang($lang){
        $this->db->select('id,year,logo,title_'.$lang);
        $this->db->from('projects');
        $this->db->where('show',1);
        $this->db->order_by('sort', 'asc');
        return $this->db->get()->result();
    }

    function getLogoFile($id){
        $this->db->select('logo');
        $this->db->from('projects');
        $this->db->where('id',$id);
        $this->db->order_by('sort', 'asc');
        return current($this->db->get()->result())->logo;
    }
    
    
/*
    function getAllShortByLang($lang){
        $this->db->select('id,title_'.$lang);
        $this->db->from('projects');
        $this->db->where('show',1);
        $this->db->order_by('sort', 'asc');
        //return
        $retArr = $this->db->get()->result();

        $this->load->model('MPhotos','MPhotos',TRUE);
        foreach ( $retArr as $g ){
            $this->db->where('gallery_id', $g->id);
            $this->db->from('photos');
            $this->db->order_by('sort', 'asc');
            $this->db->limit(1);
            $firstPhoto = current($this->db->get()->result());
            //$g->numPhotos = count($photos);
            //$firstPhoto = current($photos);
            //$g->logo = current($photos);
            $this->db->where('id',$firstPhoto->file_id);
            $this->db->from('files');
            $firstFile = current($this->db->get()->result());
            $g->logo = $firstFile->file;
        }
        return $retArr;
    }
    */

    function prepareShortNews($newsGalleryID,$numOfNews){
        $this->db->select('id,title_pl,news_short_desc');
        $this->db->from('projects');
        $this->db->where('category_id',$newsGalleryID);
        $this->db->order_by('sort', 'asc');
        $this->db->limit(3);
        return $this->db->get()->result();
    }

    function getSingleByCategoryID($cat){
        $this->db->select('*');
        $this->db->where('category_id', $cat);
        $this->db->order_by('sort', 'asc');
        return current($this->db->get('projects')->result());
    }

    function getSingleByCategoryIDPhotos($cat){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('category_id', $cat);
        $this->db->order_by('sort', 'asc');
        $retGall = current($this->db->get()->result());

        $this->load->model('MPhotos','MPhotos',TRUE);
        //return
        $photos = $this->MPhotos->get_photos($retGall->id);

        

        return $photos;
        
        //$this->db->where('gallery_id', $retGall->id);
        //$this->db->order_by('sort', 'asc');
        //return $this->db->get('photos')->result();
    }

    function getLogoPhoto($id){
        //tu cos nie dziala
        $this->load->model('MPhotos','MPhotos',TRUE);
        return current($this->MPhotos->get_photos($id));
    }

    function getAllByCategoryID($cat){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('category_id', $cat);
        $this->db->order_by('sort', 'asc');
        $retArr = $this->db->get()->result();
        
        foreach ( $retArr as $g ){
            $this->db->where('gallery_id', $g->id);
            $this->db->from('photos');
            $g->numPhotos = $this->db->count_all_results();
            $g->logo = $this->getLogoPhoto($g->id);
        }
        return $retArr;
    }

    function getAll(){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->order_by('sort', 'asc');
        $retArr = $this->db->get()->result();
        
        foreach ( $retArr as $g ){
//            $this->db->where('gallery_id', $g->id);
//            $this->db->from('photos');
//            $photos = $this->db->get()->result();
            $g->numPhotos = 0; //count($photos);
//            $g->logo = current($photos);
        }
        
        return $retArr;
    }
    
    function get_all(){
        $this->db->select('id,title_pl,title_en');
        $this->db->from('projects');
        $this->db->order_by('id', 'asc');
        return $this->db->get()->result();
    }
    
    function getAllWorks(){
        $this->db->select('id,title_pl,album_id');
        $this->db->from('projects');
        $this->db->order_by('sort', 'asc');
        $works = $this->db->get()->result();
        // obrazek logo do kazdego:
        foreach ( $works as $work ){
            
            //$work->firstPicture
        }
        
        return $works;
    }

    function get_photos($id){
        $this->db->select('*');
        $this->db->from('photos');
        $this->db->where('gallery_id', $id);
        $this->db->order_by('sort', 'asc');
        return $this->db->get()->result();
    }

    function get_texts($id){
        $this->db->select('id,title_pl,desc_pl,short_desc_pl,news_short_desc');
        $this->db->from('projects');
        $this->db->where('id', $id);
        return current($this->db->get()->result());
    }

    function get($id){
        $this->db->select('*');
        $this->db->from('projects');
        $this->db->where('id', $id);
        return current($this->db->get()->result());
    }

    function getSpeedByCategoryID($cat){
        $this->db->select('slideSpeed');
        $this->db->where('category_id', $cat);
        return current($this->db->get('projects')->result())->slideSpeed;
    }

    function getSpeed($id){
        $this->db->select('slideSpeed');
        $this->db->where('id', $id);
        //var_dump( $id );
        //var_dump( $this->db->get('projects')->result() );
        return current($this->db->get('projects')->result())->slideSpeed;
    }

    function add($front){
        $sort = 0;
        
        if ( $front )
        {
            $this->db->from('projects');
            $oldGalleries = $this->db->get()->result();

            foreach ( $oldGalleries as $g ){
                $this->db->where('id', $g->id);
                $this->db->update('projects', array('sort'=>(++$g->sort)) );
            }
            $sort = 0;
        }
        else
        {
            $this->db->from('projects');
            $sort = $this->db->count_all_results();
        }

        $this->db->insert('projects',array('title_pl'=>'tytuł','title_en'=>'title','sort' => $sort));
    }

    function del($id){
        $this->db->where('id',$id);
        $this->db->delete('projects');
    }

    function addPhoto($galleryID){
        $this->db->insert('photos',array('gallery_id'=>$galleryID));
    }

    function delPhoto($id){
        $this->db->where('id',$id);
        $this->db->delete('photos');
    }

    function modify($id,$what,$val){
        $this->db->where('id',$id);
        $this->db->update('projects', array($what=>$val));
        return $id.$what.$val;
    }

    function sort($projects){
        for ($i = 0; $i < count($projects); $i++) {
            $this->db->where('id', $projects[$i]);
            $this->db->update('projects', array('sort'=>$i) );
        }
    }

    function setShowFiles($id,$show){
        $this->db->where('id',$id);
        $this->db->update('projects', array('showFiles'=>$show));
    }
    
    function getShowedFilesID(){
        $this->db->select('id');
        $this->db->where('showFiles', '1');
        $cts = $this->db->get('projects')->result();

        $retArr = array();
        foreach ( $cts as $c ){
            $retArr[] = $c->id;
        }
        return $retArr;
    }

    function clearShowFiles(){
        $this->db->where('showFiles', '1');
        $this->db->update('projects', array('showFiles'=>'0'));
    }
}
?>