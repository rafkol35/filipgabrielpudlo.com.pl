<?php

class Projects extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['innerJSs'] = array('panel/projects/index.php');
        $data['title'] =  'Projekty';

        $this->load->view('panel/header',$data);
        $this->load->view('panel/projects/index');
        $this->load->view('panel/footer');
    }

    function toHtmlTextCategory() {
        $this->load->model('MProjects','MProjects',TRUE);
        $data['projects'] = $this->MProjects->get_all();
        $this->load->view('panel/projects/ajax/printProjectsToTextCategory', $data);
    }

    function toHtml() {
        $this->load->model('MProjects','MProjects',TRUE);
        $data['galleries'] = $this->MProjects->getAll();
        
        $this->load->model('MAlbums','MAlbums',TRUE);
        $data['albums'] = $this->MAlbums->getAll();
        
        $this->load->view('panel/projects/ajax/printProjects', $data);
    }

    function add(){
        $this->load->model('MProjects', 'MProjects', TRUE);
        $this->MProjects->add(false);
    }

    function del(){
        /*
        if ( $$_POST['deleteFiles'] ){
            $this->load->model('MFiles','MFiles',TRUE);
            $this->MFiles->delAllWithGalleyID();
        }
         */
        $this->load->model('MPhotos','MPhotos',TRUE);
        $this->MPhotos->delAllWithGalleyID($_POST['id']);
        $this->load->model('MProjects', 'MProjects', TRUE);
        $this->MProjects->del($_POST['id']);

        $this->load->model('MTextsbinds','MTextsbinds',TRUE);
        $this->MTextsbinds->delAllByProject($_POST['id']);
    }

    function modify() {
        $this->load->model('MProjects','MProjects',TRUE);
        echo $this->MProjects->modify($_POST['id'], $_POST['what'], $_POST['val']);
    }

    function sort(){
        $this->load->model('MProjects','MProjects',TRUE);
        $this->MProjects->sort( $_POST['gl'] );
    }

    function setShowFiles(){
        $this->load->model('MProjects','MProjects',TRUE);
        $this->MProjects->setShowFiles($_POST['id'],$_POST['show']);
    }

    function clearShowFiles(){
        $this->load->model('MProjects','MProjects',TRUE);
        $this->MProjects->clearShowFiles();
    }
}

?>
