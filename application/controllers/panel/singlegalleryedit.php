<?php
class SingleGalleryEdit extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index($which) {

        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $perms = $this->MUsers->get_permissions( $this->session->userdata('uid') );

            if( !$perms[$which]->havePermission ){
                redirect('/panel/index/noaccess', 'refresh');
                exit(0);
            }
            $data['perms'] = $perms;
        }

        $data['innerJSs'] = array('panel/singleGalleryEdit.php');
        $data['jscripts'] = array('swfupload/swfupload.js','handlers.js');

        $this->load->model('MCategories','MCategories',TRUE);
        $cts = $this->MCategories->getToMenu();
        $data['title'] = ' Zdjęcia : '.($cts[$which]->fullText_pl);
        $data['categoryID'] = $cts[$which]->id;

        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $galleries = $this->MGalleries->getAllByCategoryID($cts[$which]->id);
        
        $data2['categoryHaveGalery'] = count($galleries) > 0;
        $data['cts'] = $cts;

        if ( count($galleries) )
        {
            $data2['photos'] = $this->MGalleries->get_photos($galleries[0]->id);
            $data['galleryID'] = $galleries[0]->id;
            $data2['galleryID'] = $galleries[0]->id;

            $data2['slideSpeed'] = $galleries[0]->slideSpeed;
        }
        else
        {
            $data2['photos'] = array();
            $data['galleryID'] = 0;
            $data2['galleryID'] = 0;
        }
        
        $this->load->view('panel/header2',$data);
        $this->load->view('panel/singlegalleryedit',$data2);
        $this->load->view('panel/footer2');
    }

    function text($which,$lang='pl') {

        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $perms = $this->MUsers->get_permissions( $this->session->userdata('uid') );

            if( !$perms[$which]->havePermission ){
                redirect('/panel/index/noaccess', 'refresh');
                exit(0);
            }
            $data['perms'] = $perms;
        }

        $data['innerJSs'] = array('panel/singleGalleryEditText.php');
        $data['jscripts'] = array('tiny_mce/tiny_mce.js');

        $this->load->model('MCategories','MCategories',TRUE);
        $cts = $this->MCategories->getToMenu();
        $data['title'] = ' Edycja podstrony : '.($cts[$which]->fullText_pl);
        $data['categoryID'] = $cts[$which]->id;

        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $galleries = $this->MGalleries->getAllByCategoryID($cts[$which]->id);
        $data2['categoryHaveGalery'] = count($galleries) > 0;
        $data['cts'] = $cts;

        if ( count($galleries) === 1 ) // zawsze powinno byc spełnione
        {
            $data2['galeryTexts'] = $this->MGalleries->get_texts($lang,$galleries[0]->id);
            $data['galleryID'] = $galleries[0]->id;
            $data2['galleryID'] = $galleries[0]->id;

            $this->load->model('MAlbums','MAlbums',TRUE);
            $data2['albums'] = $this->MAlbums->getAll();

            $data2['gallery'] = $galleries[0];
        }
        else if( count($galleries) === 0 )
        {
            $this->printError('Brak podlaczonej galerii.<br /> Usuń i dodaj stronę jeszcze raz.');
            return;
        }
        else
        {
            $this->printError('Za dużo podłączonych galerii !!!');
            return;
        }
        
        $data['lang'] = $lang;
        $data2['lang'] = $lang;
        $data['which'] = $which;
        $data2['which'] = $which;

        $this->load->view('panel/header2',$data);
        $this->load->view('panel/singlegalleryedittext',$data2);
        $this->load->view('panel/footer2');
    }
}

?>