<?php
class MPhotos extends CI_Model{

    function getPhotoTitle($albumID,$wp,$lang){
        $t = "title_$lang";
        $this->db->select($t);
        $this->db->where('album_id', $albumID);
//        $this->db->where('sort', $wp);
        $this->db->order_by('sort','asc');
//        return current($this->db->get('photos')->result())->$t;
        $retArr = $this->db->get('photos')->result();
        return $retArr[$wp]->$t;
    }
    function get_photos_by_galleryID($galleryID){
        $this->db->select('album_id');
        $this->db->where('id',$galleryID);
        $albumID = current( $this->db->get('galleries')->result() )->album_id;

        if ( $albumID == -1 ) return array();
        else{
            return $this->get_photos($albumID);
        }
    }

    function setProperAlbumIDFromActualAlbumID(){
        $this->db->select('id,album_id');
        $galleryNums =  $this->db->get('photos')->result();
        $retArr = array();
        foreach ( $galleryNums as $p ){
            $this->db->select('id,album_id');
            $this->db->where('id',$p->album_id);

            $gal = current($this->db->get('galleries')->result());
            if ( !empty($gal) ){
                $properAlbumID = $gal->album_id;
//                $properAlbumID = current($this->db->get('galleries')->result());
                $this->modify($p->id,'album_id',$properAlbumID);
            }

            //$this->modify($g->id,'album_id',$properAlbumID);
            $retArr[$p->id] = $properAlbumID;
//            $retArr[$p->id] = $gal;
        }
        return $retArr;
    }

    function get_photos($albumID){
        $this->db->select('photos.id,title_pl,title_en,file,photos.date');
        $this->db->from('photos');
        $this->db->join('files', 'files.id = photos.file_id');
        $this->db->where('album_id', $albumID);
        $this->db->order_by('sort', 'asc');
        $photos = $this->db->get()->result();
        foreach ( $photos as $p ){
            $a = getimagesize ( base_url().'/resources/images/photo/normal/'.$p->file );
            $p->width = $a[0];
            $p->height = $a[1];
        }
        return $photos;
    }

    function get($id){
        $this->db->select('*');
        $this->db->from('photos');
        $this->db->where('id', $id);
        return current($this->db->get()->result());
    }

    function add($albumID){
        $this->db->like('album_id', $albumID);
        $this->db->from('photos');
        $srt = $this->db->count_all_results();
        $this->load->model('MFiles','MFiles',TRUE);
        $ff = $this->MFiles->getEmptyFileID();
        $this->db->insert('photos',array('sort'=>$srt,'file_id'=>$ff,'title_pl'=>'tytuł','title_en'=>'title','album_id'=>$albumID));
    }

    function del($id){
        $this->db->select('*');
        $this->db->where('id',$id);
        $delPhoto = current($this->db->get('photos')->result());

        $allInAlbum = $this->db->get_where('photos', array('sort >'=>$delPhoto->sort,'album_id'=>$delPhoto->album_id))->result();

        foreach ($allInAlbum as $p) {
            $this->db->where('id', $p->id);
            $this->db->update('photos', array('sort' => $p->sort - 1));
        }
        $this->db->where('id',$id);
        $this->db->delete('photos');
    }

    function delAll($fileID){
        $this->db->select('id');
        $this->db->where('file_id',$fileID);
        $allDelPhotos = $this->db->get('photos')->result();

        foreach ($allDelPhotos as $p) {
            $this->del($p->id);
        }
    }

    function resetAll($fileID){
        $this->db->select('id');
        $this->db->where('file_id',$fileID);
        $allResetPhotos = $this->db->get('photos')->result();

        $this->load->model('MFiles','MFiles',TRUE);
        $zeroFileID = $this->MFiles->getEmptyFileID();

        foreach ($allResetPhotos as $p) {
            $this->db->where('id', $p->id);
            $this->db->update('photos', array('file_id' => $zeroFileID));
        }
    }

    function modify($id,$what,$val){
        $this->db->where('id',$id);
        $this->db->update('photos', array($what=>$val));
    }

    function modifyA($id,$valArray){
        $this->db->where('id',$id);
        $this->db->update('photos', $valArray);
    }

    function sort($photos){
        for ($i = 0; $i < count($photos); $i++) {
            $this->db->where('id', $photos[$i]);
            $this->db->update('photos', array('sort'=>$i) );
        }
    }
}
?>
