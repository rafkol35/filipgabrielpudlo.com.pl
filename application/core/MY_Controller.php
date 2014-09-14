<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
        
        $this->load->library('session');
        
        if (!$this->session->userdata('uid')) {
            redirect('/page/login/', 'refresh');
        }
//        redirect('/iea/inBuild/', 'refresh');
    }
    
    protected function printError($errorText){
        $dataHeader['title'] = 'BŁĄD!!!';
        $dataContent['errorText'] = $errorText;
        $this->load->view('panel/header2',$dataHeader);
        $this->load->view('panel/error',$dataContent);
        $this->load->view('panel/footer2');
    }
    
}
