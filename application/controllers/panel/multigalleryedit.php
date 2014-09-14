<?php
class MultiGalleryEdit extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index($which,$lang='pl') {

        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $perms = $this->MUsers->get_permissions( $this->session->userdata('uid') );

            if( !$perms[$which]->havePermission ){
                redirect('/panel/index/noaccess', 'refresh');
                exit(0);
            }
            $data['perms'] = $perms;
        }
        
        $data['innerJSs'] = array('panel/multiGalleryEdit.php');
        $data['jscripts'] = array('tiny_mce/tiny_mce.js');

        $this->load->model('MCategories','MCategories',TRUE);
        $cts = $this->MCategories->getToMenu();
        $data['title'] = ($cts[$which]->fullText_pl);
        $data['categoryID'] = $cts[$which]->id;
        //$data2['showCatDesc'] = $cts[$which]->;

        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $data['cts'] = $cts;
        $data2['cts'] = $cts;
        $data2['actCt'] = $cts[$which];

        $this->load->model('MSettings','MSettings',TRUE);
        $data2['newsScrollSpeed']= $this->MSettings->get('newsScrollSpeed');
        $data2['newsText_pl'] = $this->MSettings->get('newsText_pl');
        $data2['newsText_en'] = $this->MSettings->get('newsText_en');
        $data2['newsAuto'] = $this->MSettings->get('newsAuto');
        
        $data['lang'] = $lang;
        $data2['lang'] = $lang;
        $data['which'] = $which;
        $data2['which'] = $which;

        $this->load->view('panel/header2',$data);
        $this->load->view('panel/multigalleryedit',$data2);
        $this->load->view('panel/footer2');
    }

    function edit($whichID){
        $this->load->model('MCategories','MCategories',TRUE);
        $cts = $this->MCategories->getToMenuID();

        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $gallery = $this->MGalleries->get($whichID);

        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $perms = $this->MUsers->get_permissions( $this->session->userdata('uid') );

            if( !$perms[$cts[$gallery->category_id]->name]->havePermission ){
                redirect('/panel/index/noaccess', 'refresh');
                exit(0);
            }
            $data['perms'] = $perms;
        }

        $data['innerJSs'] = array('panel/singleGalleryEdit.php');
        $data['jscripts'] = array('swfupload/swfupload.js','handlers.js');

        $data2['categoryHaveGalery'] = true;
        $data['cts'] = $cts;

        $data2['photos'] = $this->MGalleries->get_photos($whichID);
        $data['galleryID'] = $whichID;
        $data2['galleryID'] = $whichID;

        $data['title'] = ' Zdjęcia : '.($cts[$gallery->category_id]->fullText_pl).' : '.$gallery->title_pl;

        $data['categoryID'] = $cts[$gallery->category_id]->id;
        $data2['slideSpeed'] = $gallery->slideSpeed;
       
        $this->load->view('panel/header2',$data);
        $this->load->view('panel/singlegalleryedit',$data2);
        $this->load->view('panel/footer2');
    }

    function text($whichID,$lang='pl') {
        $this->load->model('MCategories','MCategories',TRUE);
        $cts = $this->MCategories->getToMenuID();

        $this->load->model('MGalleries', 'MGalleries', TRUE);
        $gallery = $this->MGalleries->get($whichID);
        $data2['gallery'] = $gallery;
        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $perms = $this->MUsers->get_permissions( $this->session->userdata('uid') );

            if( !$perms[$cts[$gallery->category_id]->name]->havePermission ){
                redirect('/panel/index/noaccess', 'refresh');
                exit(0);
            }
            $data['perms'] = $perms;
        }

        $data['innerJSs'] = array('panel/multiGalleryEditText.php');
        $data['jscripts'] = array('tiny_mce/tiny_mce.js');

        $data2['categoryHaveGalery'] = true;
        $data['cts'] = $cts;

        $data2['galeryTexts'] = $this->MGalleries->get_texts($lang,$whichID);
        $data['galleryID'] = $whichID;
        $data2['galleryID'] = $whichID;

        $data2['thisIsNews'] = false;

        if ( $cts[ $gallery->category_id ]->name == 'news' ){
             $data2['thisIsNews'] = true;
             $data['title'] = 'Tekst: Aktualność : '.$gallery->title_pl;
        }
        else
        {
            $data['title'] = ' Tekst : '.($cts[$gallery->category_id]->fullText_pl).' : '.$gallery->title_pl;
        }

        $data['categoryID'] = $cts[$gallery->category_id]->id;

        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $data['perms'] = $this->MUsers->get_permissions( $this->session->userdata('uid') );
        }

        $data['lang'] = $lang;
        $data2['lang'] = $lang;

        $this->load->model('MAlbums','MAlbums',TRUE);
        $data2['albums'] = $this->MAlbums->getAll();

        $this->load->view('panel/header2',$data);
        $this->load->view('panel/multigalleryedittext',$data2);
        $this->load->view('panel/footer2');
    }

    
}

?>