<?php

class Pages extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $dataHead['title'] = 'Strony';
        $dataHead['jscripts'] = array('jquery-ui-1.8.2.custom.min.js');
        $dataHead['innerJSs'] = array('panel/pages.php');

        $this->load->view('panel/header2', $dataHead);
        $this->load->view('panel/pages/index');
        $this->load->view('panel/footer2');
    }

    function add($name, $multi) {
        $this->load->model('MCategories', 'MPages', TRUE);
        echo $this->MPages->add($name, $multi);
    }

    function del() {
        $this->load->model('MCategories', 'MPages', TRUE);
        $this->MPages->del($_POST['id']);
    }

    function modify() {
        $this->load->model('MCategories', 'MPages', TRUE);
        $this->MPages->modify($_POST['id'], $_POST['what'], $_POST['val']);
        //echo $_POST['id'].' '.$_POST['what'].' '.$_POST['val'];
    }
    
    function toHtml() {
        $this->load->model('MCategories', 'MPages', TRUE);
        $data['pages'] = $this->MPages->getAllShort();
        $this->load->view('panel/pages/ajax/print', $data);
    }

//    function adminAll(){
//        $data['title'] = 'Edycja użytkowników';
//        $data['innerJSs'] = array('panel/users/adminAll.php');
//
//        $this->load->view('panel/header2',$data);
//        $this->load->view('panel/users/adminAll');
//        $this->load->view('panel/footer2');
//    }
//
//    function myAccount($userID){
//        $data['title'] = 'Edycja konta';
//        $data['innerJSs'] = array('panel/users/myAccount.php');
//
//        $this->load->model('MUsers','MUsers',TRUE);
//        $data2['user'] = $this->MUsers->get($userID);
//
//        $data['perms'] = $this->MUsers->get_permissions( $this->session->userdata('uid') );
//
//        $this->load->view('panel/header2',$data);
//        $this->load->view('panel/users/myAccount',$data2);
//        $this->load->view('panel/footer2');
//    }
//
//    function editPermissions(){}
//
//    
//
//    function insertPermissions(){
//        $this->load->model('MUsers','MUsers',TRUE);
//        $data2['permissions'] = $this->MUsers->get_permissions($_POST['userid']);
//        $data2['lang'] = 'pl';
//        $this->load->view('panel/users/ajax/printPermissions',$data2);
//    }
//
//    function addUser() {
//        $this->load->model('MUsers','MUsers',TRUE);
//        echo $this->MUsers->add_user( $_POST['login'] );
//    }
//
//    function addAdmin() {
//        $this->load->model('MUsers','MUsers',TRUE);
//        echo $this->MUsers->add_admin( $_POST['login'] );
//    }
//
//    function delUser(){
//        $this->load->model('MUsers','MUsers',TRUE);
//        $this->MUsers->del_user( $_POST['userid'] );
//    }
//
//    function changeUser(){
//        $this->load->model('MUsers','MUsers',TRUE);
//        $this->MUsers->change_user( $_POST['uid'], $_POST['what'], $_POST['val'] );
//    }
//
//    function setPerm(){
//        $this->load->model('MUsers','MUsers',TRUE);
//        if ( $_POST['val'] ){
//            $this->MUsers->add_perm( $_POST['userid'], $_POST['which'] );
//        }
//        else{
//            $this->MUsers->del_perm( $_POST['userid'], $_POST['which'] );
//        }
//    }
}

?>
