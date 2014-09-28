<?php
class Albums extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index($lang='pl') {
        $data['title'] = 'Albumy';
        $data['mi'] = 'albums';
        $data['jscripts'] = array();
        $data['innerJSs'] = array('panel/albums.php');

        $this->load->view('panel/header',$data);
        $this->load->view('panel/albums/index');
        $this->load->view('panel/footer');
    }

    function toHtml() {
        $this->load->model('MAlbums','MAlbums',TRUE);
        $data['albums'] = $this->MAlbums->getAll($_POST['sortType'],$_POST['sort']);
        $this->load->view('panel/albums/ajax/printAlbums', $data);
    }

    function add(){
        $this->load->model('MAlbums', 'MAlbums', TRUE);
        $this->MAlbums->add();
    }

    function del(){
        $this->load->model('MAlbums', 'MAlbums', TRUE);
        $this->MAlbums->del($_POST['id']);
    }

    function modify() {
        $this->load->model('MAlbums', 'MAlbums', TRUE);
        $this->MAlbums->set($_POST['sw'], $_POST['sv'], $_POST['w'], $_POST['v']);

    }

    function editByProjectID($projectID){
        $this->load->model('MProjects','MProjects',TRUE);
        $albumID = $this->MProjects->get($projectID)->album_id;
        $this->edit($albumID);
    }

    function edit($albumID){

        $data['mi'] = 'albums';
        $data['jscripts'] = array('jquery-ui-1.8.2.custom.min.js');

        $data['innerJSs'] = array('panel/albumEdit.php');
        $data['jscripts'] = array('swfupload/swfupload.js','handlers.js');

        $this->load->model('MAlbums', 'MAlbums', TRUE);
        $a = $this->MAlbums->get($albumID);
        $data['title'] = "Edycja albumu : $a->name";

        $data2['photos'] = $this->MAlbums->get_photos($albumID);
        $data['albumID'] = $albumID;
        $data2['albumID'] = $albumID;

        $this->load->view('panel/header',$data);
        $this->load->view('panel/albums/edit',$data2);
        $this->load->view('panel/footer');
    }

//    function index($which) {
//
//
//        $this->load->model('MGalleries', 'MGalleries', TRUE);
//        $galleries = $this->MGalleries->getAllByCategoryID($cts[$which]->id);
//
//        $data2['categoryHaveGalery'] = count($galleries) > 0;
//        $data['cts'] = $cts;
//
//        if ( count($galleries) )
//        {
//            $data2['photos'] = $this->MGalleries->get_photos($galleries[0]->id);
//            $data['galleryID'] = $galleries[0]->id;
//            $data2['galleryID'] = $galleries[0]->id;
//
//            $data2['slideSpeed'] = $galleries[0]->slideSpeed;
//        }
//        else
//        {
//            $data2['photos'] = array();
//            $data['galleryID'] = 0;
//            $data2['galleryID'] = 0;
//        }
//
//        $this->load->view('panel/header2',$data);
//        $this->load->view('panel/singlegalleryedit',$data2);
//        $this->load->view('panel/footer2');
//    }


}

?>