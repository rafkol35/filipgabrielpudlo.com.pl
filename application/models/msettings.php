<?php
class MSettings extends CI_Model{

    function get($what){
        $this->db->select('val');
        $this->db->from('settings');
        $this->db->where('what', $what);
        $_r = current($this->db->get()->result());
        return $_r->val;
    }

    function set($what,$val){
        $this->db->where('what',$what);
        $this->db->update('settings', array('val'=>$val));
    }
    
    function getSlideshowPhotos(){
        $albumID = $this->get('slieshowalbum_id');
        $this->load->model('MPhotos', 'MPhotos', TRUE);
        $retArr2 = $this->MPhotos->get_photos($albumID);
        $retArr = array();
        
        foreach ( $retArr2 as $g ){
            $retArr[] = $g->file;
        }
        return $retArr;
    }
    
}
?>
