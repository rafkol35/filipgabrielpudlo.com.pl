<?php
class MFiles extends CI_Model{

    function getAllWithCts($cts,$sortType,$param){
        $ff = $this->getEmptyFileID();
        
        if ( $sortType == 'name' ){
            $this->db->select('*');
            $this->db->from('files');
            //$this->db->where('target >',0);
            $this->db->not_like('id',$ff);
            $this->db->where_in('category_id', $cts);
            $this->db->order_by('file', $param);
            return $this->db->get()->result();
        }
        else if ( $sortType == 'date' ){
            $this->db->select('*');
            $this->db->from('files');
            //$this->db->where('target >',0);
            $this->db->not_like('id',$ff);
            $this->db->where_in('category_id', $cts);
            $this->db->order_by('date', $param);
            return $this->db->get()->result();
        }
    }

    function getAllWithStr($str,$sortType,$param){
        
        $ff = $this->getEmptyFileID();
        
        if ( $sortType == 'name' ){
            $this->db->select('*');
            $this->db->from('files');
            //$this->db->where('target >',0);
//            $this->db->where_in('category_id', $cts);
            $this->db->like('file', $str);
            $this->db->not_like('id',$ff);
            $this->db->order_by('file', $param);
            return $this->db->get()->result();
        }
        else if ( $sortType == 'date' ){
            $this->db->select('*');
            $this->db->from('files');
            //$this->db->where('target >',0);
//            $this->db->where_in('category_id', $cts);
            $this->db->like('file', $str);
            $this->db->not_like('id',$ff);
            $this->db->order_by('date', $param);
            return $this->db->get()->result();
        }
    }
    
    function getAll($sortType,$param){
        
        $ff = $this->getEmptyFileID();
        
        if ( $sortType == 'name' ){
            $this->db->select('*');
            $this->db->from('files');
            //$this->db->where('target >',0);
            $this->db->not_like('id',$ff);
            $this->db->order_by('file', $param);
            return $this->db->get()->result();
        }
        else if ( $sortType == 'date' ){
            $this->db->select('*');
            $this->db->from('files');
            //$this->db->where('target >',0);
            $this->db->not_like('id',$ff);
            $this->db->order_by('date', $param);
            return $this->db->get()->result();
        }
    }

    function get($id){
        $this->db->select('*');
        $this->db->from('files');
        $this->db->where('id', $id);
        return current($this->db->get()->result());
    }
/*
    function add($file){
        $this->db->insert('files',array('file'=>$file));
    }*/
    function add($file,$categoryID){
        $this->db->insert('files',array('file'=>$file,'category_id'=>-1));
    }
    function del($id){
        $this->db->where('id',$id);
        $this->db->delete('files');
    }
    function delF($file){
        $this->db->where('file',$file);
        $this->db->delete('files');
    }

    function getFirstFileID(){
        $this->db->select('id');
        $this->db->from('files');
        $this->db->limit(1);
        $rv = current($this->db->get()->result());
        return $rv->id;
    }
    function getEmptyFileID(){
        $this->db->select('id');
        $this->db->from('files');
        $this->db->where('file','brakpliku.jpg');
        $rv = current($this->db->get()->result());
        return $rv->id;
    }
    
}
?>
