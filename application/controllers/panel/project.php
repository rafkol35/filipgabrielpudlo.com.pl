<?php
class Project extends MY_Controller {

    public $dataHead;
    public $dataPage;
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('MProjects','MProjects',TRUE);
        
        $this->dataHead = array();
        $this->dataPage = array();
    }

//    function photos($whichID){
//        $this->dataPage['project'] = $this->MProjects->get($whichID);
//        $this->dataPage['projectID'] = $whichID;
//
//        $this->dataHead['innerJSs'] = array('panel/project/photos.php');
//        $this->dataHead['title'] = $this->dataPage['project']->title_pl.' : Zdjęcia';
//        //$data['styles'] = array('default.css');
//
//        //$data2['photos'] = $this->MGalleries->get_photos($whichID);
//        //$this->load->model('MPhotos','MPhotos',TRUE);
//        //$data['photos'] = $this->MPhotos->get_photos($whichID);
//        
//        //$data2['gallery'] = $gallery;
//        //$data2['slideSpeed'] = $gallery->slideSpeed;
//        //$data2['cts'] = $this->MGalleries->getAll();
//
//        $this->load->view('panel/header',$this->dataHead);
//        $this->load->view('panel/project/photos',$this->dataPage);
//        $this->load->view('panel/footer');
//    }

    function textEdit($whichID){
        $this->dataPage['project'] = $this->MProjects->get($whichID);
        $this->dataPage['projectID'] = $whichID;
        
        $this->dataHead['innerJSs'] = array('panel/project/text.php');
        $this->dataHead['jscripts'] = array('tinymce/tinymce.min.js');
        $this->dataHead['galleryID'] = $whichID;
    }
    
    function fullDesc($whichID){
        $this->textEdit($whichID);
        $this->dataHead['title'] = $this->dataPage['project']->title_pl.' : Pełny opis projektu';

        $this->load->view('panel/header',$this->dataHead);
        $this->load->view('panel/project/text',$this->dataPage);
        $this->load->view('panel/footer');
    }

    function shortDesc($whichID){
        $this->textEdit($whichID);
        $this->dataHead['title'] = $this->dataPage['project']->title_pl.' : Skrótowy opis projektu';
        
        $this->load->view('panel/header',$this->dataHead);
        $this->load->view('panel/project/shortText',$this->dataPage);
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
