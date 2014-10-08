<?php
class Index extends MY_Controller {

    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $data['title'] = 'Pomoc';
        $data['mi'] = '';
        $data['innerJSs'] = array('panel/index.php');

        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            //$data['perms'] = $this->MUsers->get_permissions( $this->session->userdata('uid') );
        }
        
        $this->load->view('panel/header',$data);
        $this->load->view('panel/index');
        $this->load->view('panel/footer');
    }
    
    function home(){
        $data['title'] = 'Home';
        $data['mi'] = '';
        $data['innerJSs'] = array('panel/home.php');
        $data['jscripts'] = array('tinymce/tinymce.min.js');
        
        $this->load->model('MTexts', 'MTexts', TRUE);
        $this->load->model('MFilms', 'MFilms', TRUE);
        
        $this->load->helper('directory');
        $this->load->helper('file');
        
        $map = directory_map('./resources/',1);
        
        $this->load->model('MPosts','MPosts',TRUE);
        $dataPage['posts'] = $this->MPosts->getAllTable('date','desc');
        
        $dataPage['homelatest1'] = $this->MTexts->get('name','homelatest1')->pl;
        $dataPage['homelatest1link'] = $this->MTexts->get('name','homelatest1')->en;
        $dataPage['homelatest2'] = $this->MTexts->get('name','homelatest2')->pl;
        $dataPage['homelatest2link'] = $this->MTexts->get('name','homelatest2')->en;
        $dataPage['homelatest3'] = $this->MTexts->get('name','homelatest3')->pl;
        $dataPage['homelatest3link'] = $this->MTexts->get('name','homelatest3')->en;
        
        $dataPage['numberOfNewFiles'] = $this->MFilms->update();
        $dataPage['mp4s'] = $this->MFilms->getAllTable(); 
        
        $this->load->view('panel/header',$data);
        $this->load->view('panel/page/home',$dataPage);
        $this->load->view('panel/footer');
    }
    function setTextsHome(){
        $this->load->model('MTexts', 'MTexts', TRUE);
        $this->MTexts->set('name','homelatest1','pl',$_POST['text1']);
        $this->MTexts->set('name','homelatest2','pl',$_POST['text2']);
        $this->MTexts->set('name','homelatest3','pl',$_POST['text3']);
    }
    function setFilmIncidence(){
        $this->load->model('MFilms', 'MFilms', TRUE);
        $this->MFilms->set('file',$_POST['file'],'incidence',$_POST['incidence']);
        //echo 'file '.$_POST['file'].' incidence '.$_POST['incidence'];
    }
    function setLatestNewLink(){
        $this->load->model('MTexts', 'MTexts', TRUE);
        $this->MTexts->set('name','homelatest'.$_POST['lnn'],'en',$_POST['postid']);
        //echo 'name '.'homelatest'.$_POST['lnn'].' en '.$_POST['postid'];
    }
    
    function about(){
        $data['title'] = 'About';
        $data['mi'] = '';
//        $data['innerJSs'] = array('panel/index.php');
        $data['innerJSs'] = array('panel/about.php');
        $data['jscripts'] = array('tinymce/tinymce.min.js');
        
        $this->load->model('MTexts', 'MTexts', TRUE);
        
        $dataPage['textleft'] = $this->MTexts->get('name','aboutleft')->pl;
        $dataPage['textright'] = $this->MTexts->get('name','aboutright')->pl;
        
        $this->load->view('panel/header',$data);
        $this->load->view('panel/page/about',$dataPage);
        $this->load->view('panel/footer');
    }
    function setTextsAbout(){
        $this->load->model('MTexts', 'MTexts', TRUE);
        $this->MTexts->set('name','aboutleft','pl',$_POST['textleft']);
        $this->MTexts->set('name','aboutright','pl',$_POST['textright']);
    }
    
    function contact(){
        $data['title'] = 'Contact';
        $data['mi'] = '';
        //$data['innerJSs'] = array('panel/index.php');
        $data['innerJSs'] = array('panel/contact.php');
        $data['jscripts'] = array('tinymce/tinymce.min.js');
        
        $this->load->model('MTexts', 'MTexts', TRUE);
        $dataPage['text'] = $this->MTexts->get('name','contact')->pl;
        
        $this->load->view('panel/header',$data);
        $this->load->view('panel/page/contact',$dataPage);
        $this->load->view('panel/footer');
    }
    function setTextContact(){
        $this->load->model('MTexts', 'MTexts', TRUE);
        $this->MTexts->set('name','contact','pl',$_POST['text']);
        //echo $_POST['text'];
    }
    
    function getNewsAuto(){
        $this->load->model('MSettings','MSettings',TRUE);
        echo $this->MSettings->get('newsAuto');
    }
    function setNewsAuto(){
        $this->load->model('MSettings','MSettings',TRUE);
        $this->MSettings->set('newsAuto',$_POST['state']);
    }
    function setNewsText() {
        $this->load->model('MSettings','MSettings',TRUE);
        $this->MSettings->set('newsText_'.$_POST['lang'], $_POST['val']);
    }
    
    function setNewsScrollSpeed() {
        $this->load->model('MSettings','MSettings',TRUE);
        $this->MSettings->set('newsScrollSpeed', $_POST['val']);
    }
    
    function setMainText() {
        $this->load->model('MSettings','MSettings',TRUE);
        $this->MSettings->set($_POST['what'],$_POST['val']);
    }
    
    function mainpage(){
        $data['title'] = 'Tekst na stronie głównej';
        $data['mi'] = '';
        $data['innerJSs'] = array('panel/mainpage.php');
        $data['jscripts'] = array('tiny_mce/tiny_mce.js');

//        $this->load->model('MCategories','MCategories',TRUE);
//        $data['cts'] = $this->MCategories->getToMenu();
//        $data2['newsText'] = $this->getNewsText($lang);
        
        $this->load->model('MSettings','MSettings',TRUE);
        $data2['mainText_pl'] = $this->MSettings->get('mainText_pl');
        $data2['mainText_en'] = $this->MSettings->get('mainText_en');
        
        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $data['perms'] = $this->MUsers->get_permissions( $this->session->userdata('uid') );
        }
        
        $this->load->view('panel/header2',$data);
        $this->load->view('panel/mainpage',$data2);
        $this->load->view('panel/footer2');
    }
    
    

    function runFunction($func){

//        $this->load->model('MAlbums','MAlbums',TRUE);
//        $this->MAlbums->createAlbumsFromGalleries();

        $this->load->model('MPhotos','MPhotos',TRUE);
        $data2['retArr'] = $this->MPhotos->setProperAlbumIDFromActualAlbumID();
//        $this->load->model('MGalleries','MGalleries',TRUE);
//        $data2['retArr'] = $this->MGalleries->setProperAlbumID();

        $data['title'] = 'Pomoc';
        $data['mi'] = '';
        $data['innerJSs'] = array('panel/index.php');

        $this->load->model('MCategories','MCategories',TRUE);
        $data['cts'] = $this->MCategories->getToMenu();

        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $data['perms'] = $this->MUsers->get_permissions( $this->session->userdata('uid') );
        }

        $this->load->view('panel/header2',$data);
        $this->load->view('panel/indexTest',$data2);
        $this->load->view('panel/footer2');
    }

    function noaccess(){
        $data['title'] = 'Nie masz dostępu';
        $data['innerJSs'] = array('panel/index.php');

        $this->load->model('MCategories','MCategories',TRUE);
        $data['cts'] = $this->MCategories->getToMenu();

        if ( !$this->session->userdata('is_admin') ){
            $this->load->model('MUsers','MUsers',TRUE);
            $data['perms'] = $this->MUsers->get_permissions( $this->session->userdata('uid') );
        }

        $this->load->view('panel/header2',$data);
        $this->load->view('panel/noaccess');
        $this->load->view('panel/footer2');
    }

    function download(){
        $data['title'] = 'Download';
        $data['innerJSs'] = array('panel/download.php');
        $data['styles'] = array('/swfupload/default.css');
        $data['jscripts'] = array('/swfupload2/swfupload.js',
            '/swfupload2/swfupload.queue.js',
            '/swfupload2/fileprogress.js',
            '/swfupload2/handlers.js');

        $this->load->view('panel/header2',$data);
        $this->load->view('panel/download');
        $this->load->view('panel/footer2');
    }

    function downloadableFilesToHtml(){
        $data['pdfs'] = array();
        $dir = new DirectoryIterator('./files/downloadable/');
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot() && $fileinfo->isFile())
                $data['pdfs'][] = $fileinfo->getFilename();
        }
        sort($data['pdfs']);
        $this->load->view('panel/download/ajax/printFiles', $data);
    }

    function deleteDownloadableFile(){
        if ( is_file('./files/downloadable/'.$_POST['delFile']) ){
            unlink('./files/downloadable/'.$_POST['delFile']);
        }
    }

    function test(){
        $a = 0x1;
        for( $s = 0 ; $s < 1 ; ++$s){
            $a <<= 1;
            var_dump($a);
        }

        echo '----------------------------';

        $p = 'a,b,c,d,e,f,gg,hhh,i,jjjjjj,kk';
        var_dump($p);
        //var_dump(explode(',',$p);
        $ps = explode(',',$p);
        var_dump($ps);

        $p2 = 'a1,b2,c12,d123,e12,f12,11gg,11hhh,11i,11jjjjjj,11kk';
        $ps2 = explode(',',$p2);
        var_dump($ps2);
        $psx = implode(',',$ps2);
        var_dump($psx);


        //$i = $a;
        //10000
        $i = 0x10;
        //10000
        var_dump($i);
        // 1100 0011
        // 1111
        var_dump($i & 0xf0);

        $i &= 0x10;
        var_dump($i);
        
        //echo "test()";
    }



}

