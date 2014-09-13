<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alissa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->fillPageNames();
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
        $data['pageNames'] = $this->pageNames;
        $data['pageID'] = $pageid;
        $data['title'] = $this->pageTitles[$pageid];
        $data['jscripts'] = $this->jscripts;
        $data['includeJSs'] = $this->includeJSs;
        $this->load->view('front/header',$data);
        $this->load->view('front/subpages/'.$this->pageNames[$pageid],$data);
        $this->load->view('front/footer');
    }
    
    public function index(){
        $this->jscripts[] = 'index.js';
        $this->includeJSs[] = 'index.php';
        $this->page(0);
        
        //$this->load->view('front/test');
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