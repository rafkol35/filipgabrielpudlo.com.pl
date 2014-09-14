<?php
class Categories extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

    function setShowFiles(){
        $this->load->model('MCategories','MCategories',TRUE);
        $this->MCategories->setShowFiles($_POST['id'],$_POST['show']);
    }
    
    function clearShowFiles(){
        $this->load->model('MCategories','MCategories',TRUE);
        $this->MCategories->clearShowFiles();
    }

    function modify() {
        $this->load->model('MCategories','MCategories',TRUE);
        $this->MCategories->modify($_POST['id'], $_POST['what'], $_POST['val']);
    }
}

?>