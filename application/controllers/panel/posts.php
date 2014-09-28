<?php

class Posts extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('MPosts','MPosts',TRUE);
    }

    function index() {
        $data['innerJSs'] = array('panel/posts/index.php');
        $data['title'] =  'Blog - Posty';

        $this->load->view('panel/header',$data);
        $this->load->view('panel/posts/index');
        $this->load->view('panel/footer');
    }
    
    function toHtml() {
        $data['posts'] = $this->MPosts->getAllTable('date','desc');
        $this->load->view('panel/posts/ajax/print', $data);
    }

    function add(){
        $this->MPosts->add();
    }

    function del(){
        $this->MPosts->remove('id',$_POST['id']);
    }

    function modify() {
        echo $this->MPosts->set('id',$_POST['id'], $_POST['what'], $_POST['val']);
    }
    
    function edit($id){
        $data['post'] = $this->MPosts->get('id',$id);
        
        $data['innerJSs'] = array('panel/posts/edit.php');
        $data['title'] =  'Blog - Posty - Edycja : '.$data['post']->title;
        
        $data['jscripts'] = array('tinymce/tinymce.min.js');
        
        $this->load->view('panel/header',$data);
        $this->load->view('panel/posts/edit');
        $this->load->view('panel/footer');
    }
    
    function shortDesc($postID){
        
    }
    
    function fullDesc($postID){
        
    }
}
