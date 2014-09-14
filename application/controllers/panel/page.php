<?php

class Page extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->std();
        $this->load->model('MPage','MPage',TRUE);
        $this->load->model('MChapter','MChapter',TRUE);
    }
    
    function index($name){
        //$this->load->model('MPage','MPage',TRUE);
        $this->data['pageInfo'] = $this->MPage->get('name',$name);
        $this->data['chapters'] = $this->MPage->getChapters($name);
                
        $this->data['title'] = $this->data['pageInfo']->title;
        $this->data['mi'] = '';
        $this->data['innerJSs'][] = 'panel/page/index.php';
        $this->data['page'] = $name;
        $this->data['pageID'] = $this->MPage->get('name',$name)->id;
        //$data['innerJSs'] = $this->includeJSs; //array('panel/page/index.php');
        
        //$this->load->library('Chapter2');
        //$this->data['chapter'] = new Chapter2();
        
        $this->load->view('panel/header',$this->data);
        $this->load->view('panel/page/index',$this->data);
        $this->load->view('panel/footer');
    }
    
    function calendar(){
        $this->data['title'] = 'Kalendarz terminów';
        $this->data['mi'] = '';
        $this->data['innerJSs'][] = 'panel/page/calendar.php';
        
        //$this->load->model('MAlbums', 'MAlbums', TRUE);
        //$this->data['albums'] = $this->MAlbums->getAll();
        
        $this->load->model('MSettings', 'MSettings', TRUE);
        $this->data['calendarDates'] = $this->MSettings->get('calendarDates');
        
        $this->load->view('panel/header',$this->data);
        $this->load->view('panel/page/calendar',$this->data);
        $this->load->view('panel/footer');
    }
    
    function modifyCalendarDates(){
        //echo var_dump($_POST['disableDates']);
        $this->load->model('MSettings', 'MSettings', TRUE);
        $this->MSettings->set('calendarDates',$_POST['calendarDates']);
    }
    
    function slideshow(){
        //$name = 'slideshow';
        //$this->load->model('MPage','MPage',TRUE);
        //$this->data['pageInfo'] = $this->MPage->get('name',$name);
        //$this->data['chapters'] = $this->MPage->getChapters($name);
                
        $this->data['title'] = 'SlideShow'; //$this->data['pageInfo']->title;
        $this->data['mi'] = '';
        $this->data['innerJSs'][] = 'panel/page/slideshow.php';
        //$this->data['page'] = $name;
        //$this->data['pageID'] = $this->MPage->get('name',$name)->id;
        //$data['innerJSs'] = $this->includeJSs; //array('panel/page/index.php');
        
        //$this->load->library('Chapter2');
        //$this->data['chapter'] = new Chapter2();
        
        $this->load->model('MAlbums', 'MAlbums', TRUE);
        $this->data['albums'] = $this->MAlbums->getAll();
        
        $this->load->model('MSettings', 'MSettings', TRUE);
        $this->data['slieshowalbum_id'] = $this->MSettings->get('slieshowalbum_id');
        $this->data['slieshowspeed'] = $this->MSettings->get('slieshowspeed');
        
        $this->load->view('panel/header',$this->data);
        $this->load->view('panel/page/slideshow',$this->data);
        $this->load->view('panel/footer');
    }
    
    function setSlideShowAlbum($id){
        $this->load->model('MSettings', 'MSettings', TRUE);
        $this->MSettings->set('slieshowalbum_id',$id);
    }
    
    function setSlideShowSpeed($newSpeed){
        $this->load->model('MSettings', 'MSettings', TRUE);
        $this->MSettings->set('slieshowspeed',$newSpeed);
    }
    
    function gallery(){
        $name = 'galeria';
        //$this->load->model('MPage','MPage',TRUE);
        $this->data['pageInfo'] = $this->MPage->get('name',$name);
        //$this->data['chapters'] = $this->MPage->getChapters($name);
                
        $this->data['title'] = $this->data['pageInfo']->title;
        $this->data['mi'] = '';
        $this->data['innerJSs'][] = 'panel/page/galeria.php';
        $this->data['page'] = $name;
        $this->data['pageID'] = $this->MPage->get('name',$name)->id;
        //$data['innerJSs'] = $this->includeJSs; //array('panel/page/index.php');
        
        //$this->load->library('Chapter2');
        //$this->data['chapter'] = new Chapter2();
        
        $this->load->view('panel/header',$this->data);
        $this->load->view('panel/page/galeria',$this->data);
        $this->load->view('panel/footer');
    }
             
    function printGalleryAlbums(){
        $this->load->model('MAlbumgalleryassoc', 'AGA', TRUE);
        $allACAs = $this->AGA->getAll();
        //$data['agas'] = $allACAs;
        
        $this->load->model('MAlbums', 'MAlbums', TRUE);
        $albums = $this->MAlbums->getAll();
        //$data['albums'] = $albums;
        
        //$allalbums = $this->MAlbums->getAllToAGA();
        
        //echo var_dump($albums);
        //return;
        
        foreach ($allACAs as $aga) {
            $data['aga'] = $aga;
            $data['albums'] = $albums;
            $this->load->view('panel/page/ajax/printAlbumGalleryAssoc',$data);
        }
    }
    
    function addAlbumGalleryAssoc(){
        $this->load->model('MAlbumgalleryassoc','AGA',TRUE);
        $this->AGA->add();
    }
    
    function removeAlbumGalleryAssoc($id){
        $this->load->model('MAlbumgalleryassoc','AGA',TRUE);
        $this->AGA->remove('id',$id);
    }
    
    function modifyAGA(){
        $this->load->model('MAlbumgalleryassoc','AGA',TRUE);
        $this->AGA->set($_POST['whatID'], $_POST['id'], $_POST['what'], $_POST['value']);
    }
    
    function addChapter($pageID,$chapterName){
        $chptrs = $this->MChapter->get('name',$chapterName,false);
        if( count($chptrs) ){
            echo "1";
            return;
        }
        echo $this->MChapter->add(array('page_id' => $pageID, 'name' => $chapterName));
    }
    
    function removeChapter($id){
        $this->MChapter->remove('id',$id);
    }
    
    function printChapters($id){
        $chapters = $this->MPage->getChapters($id);
        
        foreach ($chapters as $chapter) {
            $this->load->view('panel/chapter/ajax/print',$chapter);
        }
    }
    
    function sortChapters(){
        $this->MChapter->sort( $_POST['ch'] );
        //echo var_dump($_POST['ch']);
    }
    
    private function std(){
        $this->data['innerJSs'] = array('panel/globalfunctions.php');
    }
            
    private $pageNames;
    private $pageTitles;
    private $jscripts;
    private $includeJSs;
    private $data;
}
