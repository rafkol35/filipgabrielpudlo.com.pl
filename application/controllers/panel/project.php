<?php
class Project extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function photos($whichID){
        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $gallery = $this->MGalleries->get($whichID);

        $data['innerJSs'] = array('panel/project/photos.php');
        /*$data['jscripts'] = array('swfupload/swfupload.js','handlers.js');*/
        $data['galleryID'] = $whichID;
        $data['title'] = $gallery->title_pl.' : Zdjęcia';
        $data['styles'] = array('default.css');

        //$data2['photos'] = $this->MGalleries->get_photos($whichID);
        //$this->load->model('MPhotos','MPhotos',TRUE);
        //$data['photos'] = $this->MPhotos->get_photos($whichID);
        
        $data2['gallery'] = $gallery;
        $data2['slideSpeed'] = $gallery->slideSpeed;
        $data2['cts'] = $this->MGalleries->getAll();

        $this->load->view('panel/header',$data);
        $this->load->view('panel/project/photos',$data2);
        $this->load->view('panel/footer');
    }

    function text($whichID){
        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $gallery = $this->MGalleries->get($whichID);

        $data['innerJSs'] = array('panel/project/text.php');
        $data['jscripts'] = array('tiny_mce/tiny_mce.js');
        $data['galleryID'] = $whichID;
        $data['title'] = $gallery->title_pl.' : Tekst';

        //$data2['photos'] = $this->MGalleries->get_photos($whichID);
        //$data2['slideSpeed'] = $gallery->slideSpeed;
        $data2['galleryID'] = $whichID;
        $data['gallery'] = $gallery;

        $this->load->view('panel/header',$data);
        $this->load->view('panel/project/text',$data2);
        $this->load->view('panel/footer');
    }

    function shortText($whichID){
        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $gallery = $this->MGalleries->get($whichID);

        $data['innerJSs'] = array('panel/project/text.php');
        $data['jscripts'] = array('tiny_mce/tiny_mce.js');
        $data['galleryID'] = $whichID;
        $data['title'] = $gallery->title_pl.' : Krótki tekst';

        $data2['galleryID'] = $whichID;
        $data['gallery'] = $gallery;

        $this->load->view('panel/header',$data);
        $this->load->view('panel/project/shortText',$data2);
        $this->load->view('panel/footer');
    }

    function logoToHtml(){
        $this->load->model('MGalleries','MGalleries',TRUE);
        echo $this->MGalleries->getLogoFile($_POST['id']);
    }

    function setLogo(){
        $this->load->model('MFiles', 'MFiles', TRUE);
        $newLogo = $this->MFiles->get($_POST['logoFileID']);
        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $this->MGalleries->modify($_POST['id'], 'logo', $newLogo->file);
    }
}

?>
