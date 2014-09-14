<?php
class Menu extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['title'] = 'Menu';
        $data['jscripts'] = array('jquery-ui-1.8.2.custom.min.js');
        $data['innerJSs'] = array('panel/menu.php');

        $this->load->view('panel/header2',$data);
        $this->load->view('panel/menu/index');
        $this->load->view('panel/footer2');
    }

    function modify() {
        $this->load->model('MMenu', 'MMenu', TRUE);
        $this->MMenu->modify($_POST['id'], $_POST['what'], $_POST['val']);
        echo $_POST['id'].' '.$_POST['what'].' '.$_POST['val'];
    }
    
    function toHtml() {
        $this->load->model('MMenu', 'MMenu', TRUE);
        $data['menuitems'] = $this->MMenu->getAllSorted();
        $this->load->model('MCategories', 'MPages', TRUE);
        $data['pages'] = $this->MPages->getAllNames();
        $this->load->view('panel/menu/ajax/print', $data);
    }
    
    function add($parentID) {
        $this->load->model('MMenu', 'MMenu', TRUE);
        $this->MMenu->add($parentID);
    }
    function del($id) {
        $this->load->model('MMenu', 'MMenu', TRUE);
        $this->MMenu->del($id);
    }
    
    function itemup($id){
        $this->load->model('MMenu', 'MMenu', TRUE);
        $this->MMenu->itemup($id);
    }
    
    function itemdown($id){
        $this->load->model('MMenu', 'MMenu', TRUE);
        $this->MMenu->itemdown($id);
    }
    
}
?>
