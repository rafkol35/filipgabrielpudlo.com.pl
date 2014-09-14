<?php
class Photos extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function toHtml(){
        $this->load->model('MPhotos','MPhotos',TRUE);
        $data['photos'] = $this->MPhotos->get_photos($_POST['id']);
        $this->load->view('panel/photos/ajax/printPhotos', $data);
    }

    function add($albumID){
        $this->load->model('MPhotos','MPhotos',TRUE);
        $this->MPhotos->add($albumID);
    }

    function del(){
        $this->load->model('MPhotos','MPhotos',TRUE);
        $this->MPhotos->del($_POST['id']);
    }

    function modify() {
        $this->load->model('MPhotos', 'MPhotos', TRUE);
        $this->MPhotos->modify($_POST['id'], $_POST['what'], $_POST['val']);
    }

    function sort(){
        $this->load->model('MPhotos', 'MPhotos', TRUE);
        $this->MPhotos->sort( $_POST['ft'] );
    }
}

?>