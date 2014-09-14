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
        
        $data['title'] = "Home";
        $data['includeJSs'] = array('index2.php');
        
        $data['pageID'] = 'page/home';
        $data['PT'] = '1';
        
        $this->load->view('front/header2',$data);
        $this->load->view('front/subpages/home',$data);
        $this->load->view('front/footer2');
    }

    public function works(){
        $data['title'] = "Works";
        $data['includeJSs'] = array('index2.php');
        
        $data['pageID'] = 'page/works';
        $data['PT'] = '2';
        
        $this->load->view('front/header2',$data);
        $this->load->view('front/subpages/works',$data);
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
        $data['title'] = "Blog";
        $data['includeJSs'] = array('index2.php');
        
        $data['pageID'] = 'page/blog';
        $data['PT'] = '2';
        
        $this->load->view('front/header2',$data);
        $this->load->view('front/subpages/blog',$data);
        $this->load->view('front/footer2');
    }
    
    
    
    
    
    public function mojteatrdladzieci(){
        $this->includeJSs[] = 'stdmenu.php';
        $this->page(1);
    }
    
    public function repertuar(){
        $this->includeJSs[] = 'stdmenu.php';
        $this->page(2);
    }
    
    public function omnie(){
        $this->includeJSs[] = 'stdmenu.php';
        $this->page(3);
    }
    
    public function wspolpracownicy(){
        $this->includeJSs[] = 'stdmenu.php';
        $this->page(4);
    }
    
    public function rekomendacje(){
        $this->includeJSs[] = 'stdmenu.php';
        $this->page(5);
    }
    
    public function kontakt(){
        $this->includeJSs[] = 'stdmenu.php';
        $this->page(6);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */