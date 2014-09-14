<?php
class Galleries extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['title'] = 'Galerie';
        $data['mi'] = 'galleries';
        $data['jscripts'] = array('jquery-ui-1.8.2.custom.min.js');
        $data['innerJSs'] = array('panel/galleries.php');

        $this->load->view('panel/header',$data);
        $this->load->view('panel/galleries/index');
        $this->load->view('panel/footer');
    }

    function toHtml() {
        $this->load->model('MGalleries','MGalleries',TRUE);
        
        $data['galleries'] = $this->MGalleries->getAllByCategoryID($_POST['id'],$_POST['whichPage'],$_POST['ins']);

        $this->load->model('MCategories','MCategories',TRUE);
        $cts = $this->MCategories->getToMenuID();
        
        $data['thisIsNews'] = $cts[ $_POST['id'] ]->name == 'news' ? true : false;
        $this->load->model('MAlbums','MAlbums',TRUE);
        $data['albums'] = $this->MAlbums->getAll();
        
        $this->load->view('panel/galleries/ajax/printGalleries', $data);
        
        // $html = utf8_encode( $this->load->view('panel/galleries/ajax/printGalleries', $data, true) );
        //echo json_encode(array( 'titel' => 'asdf', 'html' => $html ));

        //echo '{ "html": "';
        //echo $this->load->view('panel/galleries/ajax/printGalleries', $data, true));
        //echo '"}';
    }
    
    function howManyAll() {
        $this->load->model('MGalleries','MGalleries',TRUE);
        echo count($this->MGalleries->getAllByCategoryID($_POST['id']));
    }

    function add($categoryID){
        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $this->load->model('MCategories','MCategories',TRUE);
        $cts = $this->MCategories->getToMenuID();
        if ( $cts[$categoryID]->name == 'news')
            $this->MGalleries->add($categoryID,true);
        else
            $this->MGalleries->add($categoryID,false);
    }

    function del(){
        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $this->MGalleries->del($_POST['id']);
    }

    function modify() {
        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $this->MGalleries->modify($_POST['id'], $_POST['what'], $_POST['val']);
    }
    
    function sort(){
        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $this->MGalleries->sort($_POST['gl'],$_POST['startNum'],$_POST['prefix']);
        //echo $_POST['gl'].' '.$_POST['startNum'].' '.$_POST['prefix'].' '. substr($_POST['gl'][0], strlen($_POST['prefix']) ); ;
    }

    function edit($galleryID){
        $data['title'] = 'Galleria - Edycja';
        $data['mi'] = 'galleries';
        $data['jscripts'] = array('tiny_mce/tiny_mce.js','jquery-ui-1.8.2.custom.min.js');
        
        $data['innerJSs'] = array('panel/galleryEdit.php');

        $this->load->model('MGalleries', 'MGalleries', TRUE);
        //$data['gallery'] = $this->MGalleries->get($galleryID);

        $data2['photos'] = $this->MGalleries->get_photos($galleryID);
        $data['galleryID'] = $galleryID;

        $this->load->view('panel/header',$data);
        $this->load->view('panel/galleries/edit',$data2);
        $this->load->view('panel/footer');
    }
}
?>