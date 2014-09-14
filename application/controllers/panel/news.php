//<?php
//class News extends MY_Controller {
//
//    function __construct() {
//        parent::__construct();
//    }
//
//    function index() {
//        $data['title'] = 'News';
//        $data['mi'] = 'news';
//        //$data['jscripts'] = array('tiny_mce/tiny_mce.js');
//        $data['jscripts'] = array('jquery-ui-1.8.2.custom.min.js');
//        $data['innerJSs'] = array('panel/news.php');
//
//        $this->load->view('panel/header',$data);
//        $this->load->view('panel/news/index');
//        $this->load->view('panel/footer');
//    }
//
//    function toHtml() {
//        $this->load->model('MNews','MNews',TRUE);
//        $data['news'] = $this->MNews->get_all();
//        $this->load->view('panel/news/ajax/printNews', $data);
//    }
//
//    function add(){
//        $this->load->model('MNews', 'MNews', TRUE);
//        $this->MNews->add('tytul','tresc');
//    }
//
//    function del(){
//        $this->load->model('MNews', 'MNews', TRUE);
//        $this->MNews->del($_POST['id']);
//    }
//
//    function modify() {
//        $this->load->model('MNews','MNews',TRUE);
//        $this->MNews->modify($_POST['id'], $_POST['what'], $_POST['val']);
//    }
//
//    function edit($id){
//        $data['title'] = 'News';
//        $data['mi'] = 'news';
//        $data['jscripts'] = array('tiny_mce/tiny_mce.js');
//        $data['innerJSs'] = array('panel/newEdit.php');
//
//        $this->load->model('MNews','MNews',TRUE);
//        $data['new'] = $this->MNews->get($id);
//
//        $this->load->view('panel/header',$data);
//        $this->load->view('panel/news/edit',$data);
//        $this->load->view('panel/footer');
//    }
//
//    function sort(){
//        $this->load->model('MNews', 'MNews', TRUE);
//        $this->MNews->sort( $_POST['nw'] );
//    }
//
//}
//?>

INSERT INTO  `iea_iea`.`albums` (
`id` ,
`name`
)
VALUES (
NULL ,  'test'
);