<?php

class Ajax extends MY_Controller {  
    
    function __construct() {
        parent::__construct();
    }

    function modify() {
        echo 'asdf';
        $this->load->model($_POST['model'], 'MModel', TRUE);
        $this->MModel->set($_POST['whatID'], $_POST['id'], $_POST['what'], $_POST['value']);
    }
}


