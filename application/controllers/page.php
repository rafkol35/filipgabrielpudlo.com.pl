<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

    public function __construct(){
        parent::__construct();
        //$this->fillPageNames();
    }
    
    private $pageNames;
    private $pageTitles;
    private $jscripts;
    private $includeJSs;
            
    private function fillPageNames(){
        $this->pageNames = array(
            '0' => 'index',
            '1' => 'mojteatrdladzieci',
            '2' => 'repertuar',
            '3' => 'omnie',
            '4' => 'wspolpracownicy',
            '5' => 'rekomendacje',
            '6' => 'kontakt');
        
        $this->pageTitles = array(
            '0' => 'Strona startowa',
            '1' => 'Mój teatr dla dzieci',
            '2' => 'Repertuar',
            '3' => 'O mnie',
            '4' => 'Współpracownicy',
            '5' => 'Rekomendacje',
            '6' => 'Kontakt');
        
        $this->jscripts = array();
    }
    
    public function page($pageid){
        //$data['pageNames'] = $this->pageNames;
        //$data['pageID'] = $pageid;
        //$data['title'] = $this->pageTitles[$pageid];
        //$data['jscripts'] = $this->jscripts;
        //$data['includeJSs'] = $this->includeJSs;
        $this->load->view('front/header',$data);
        $this->load->view('front/subpages/'.$this->pageNames[$pageid],$data);
        $this->load->view('front/footer');
    }
    
//     const
//          PT_Black = 0
//        , PT_White = 1
//    ;

    public function index(){
        $this->home();
    }
    
    public function home(){
        //$this->jscripts[] = 'index.js';
        //$this->includeJSs[] = 'index.php';
        //$this->page(0);
        
        //$this->load->view('front/test');
        
        $dataHead['title'] = "Home";
        $dataHead['includeJSs'] = array('index2.php');
        
        $dataHead['pageID'] = 'page/home';
        $dataHead['PT'] = '1';
        
        
        $this->load->view('front/header2',$dataHead);
        $this->load->view('front/subpages/home');
        $this->load->view('front/footer2');
    }

    public function works(){
        $dataHead['title'] = "Works";
        $dataHead['includeJSs'] = array('index2.php');
        
        $dataHead['pageID'] = 'page/works';
        $dataHead['PT'] = '2';
        
        $this->load->model('MProjects','MProjects',TRUE);
        $this->load->model('MAlbums','MAlbums',TRUE);
        
        $dataPage['projects'] = $this->MProjects->getAllWorks();
        //$dataPage['albums'] = $this->MAlbums->getAll();
        
        foreach ( $dataPage['projects'] as $project ){
            $project->firstPicture = $this->MAlbums->getFirstPhotoFile($project->album_id);
        }
        
        $this->load->view('front/header2',$dataHead);
        $this->load->view('front/subpages/works',$dataPage);
        $this->load->view('front/footer2');
    }
    
    public function work($workID){
        // znalesc tytul lepszy  czyli nazwe pracy
        
        $this->load->model('MProjects','MProjects',TRUE);
        $this->load->model('MAlbums','MAlbums',TRUE);
        $this->load->model('MFiles','MFiles',TRUE);
        
        //$dataHead[] = ;
        $dataPage['project'] = $this->MProjects->getAllWork($workID);
        
        $dataHead['title'] = 'Work '.$dataPage['project']->title_pl;
        $dataHead['includeJSs'] = array('work.php');
        
        $dataHead['pageID'] = 'page/work';
        $dataHead['PT'] = '2';
        
        $dataPage['project']->photos = $this->MAlbums->get_photos($dataPage['project']->album_id);
        
        foreach ( $dataPage['project']->photos as $photo ){
            $photo->file = $this->MFiles->get($photo->file_id)->file;
        }
        
        $this->load->view('front/header2',$dataHead);
        $this->load->view('front/subpages/work',$dataPage);
        $this->load->view('front/footer2');
    }
    
    
    public function about(){
        $data['title'] = "About";
        $data['includeJSs'] = array('index2.php');
        
        $data['pageID'] = 'page/about';
        $data['PT'] = '2';
        
        $this->load->view('front/header2',$data);
        $this->load->view('front/subpages/about',$data);
        $this->load->view('front/footer2');
    }
    
    public function contact(){
        $data['title'] = "Contact";
        $data['includeJSs'] = array('index2.php');
        
        $data['pageID'] = 'page/contact';
        $data['PT'] = '2';
        
        $this->load->view('front/header2',$data);
        $this->load->view('front/subpages/contact',$data);
        $this->load->view('front/footer2');
    }
    
    public function blog(){
        $dataHead['title'] = "Blog";
        $dataHead['includeJSs'] = array('index2.php');
        $dataHead['pageID'] = 'page/blog';
        $dataHead['PT'] = '2';
        
        $this->load->model('MPosts','MPosts',TRUE);
        $dataPage['posts'] = $this->MPosts->getAllTable('date','desc');
        
        $this->load->view('front/header2',$dataHead);
        $this->load->view('front/subpages/blog',$dataPage);
        $this->load->view('front/footer2');
    }
    
    
     public function login() {
        $this->load->helper('form');
        $this->load->library('session');
        
        $data['error_message'] = '';
        if (isset($_POST['username'])) {
            $this->load->model('MUsers', 'MUsers', TRUE);

            $username = $this->input->post('username');
            $password = $this->input->post('userpass');
            if ($this->MUsers->authenticate_user($username, $password, $uid, $is_admin)) {
                $this->session->set_userdata('uid', $uid);
                $this->session->set_userdata('is_admin', $is_admin);
                redirect('panel/index', 'refresh');
            } else {
                $data['error_message'] = '<p>Nieprawidłowy login i / lub hasło</p>';
            }
        }

        $data['title'] = "Logowanie do edycji";
        $data['includeJSs'] = array('index2.php');
        
        $data['pageID'] = 'page/login';
        $data['PT'] = '1';
        
        $this->load->view('front/header2',$data);
        $this->load->view('front/subpages/login',$data);
        $this->load->view('front/footer2');
    }

    public function logout() {
        $this->load->library('session');
        
        $this->load->library('session');
        $this->session->sess_destroy();
        
        $data['title'] = "Wylogowanie z edycji";
        $data['includeJSs'] = array('index2.php');
        
        $data['pageID'] = 'page/logout';
        $data['PT'] = '1';
        
        $this->load->view('front/header2',$data);
        $this->load->view('front/subpages/logout',$data);
        $this->load->view('front/footer2');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */