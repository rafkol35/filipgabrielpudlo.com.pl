<?php

class Chapter extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->std();
        $this->load->model('MPage', 'MPage', TRUE);
        $this->load->model('MChapter', 'MChapter', TRUE);
        $this->load->model('MTexts', 'MTexts', TRUE);
        $this->data['innerJSs'][] = ('panel/VariableEditor/CreateTabs.php');
    }

    function index($id) {
        $this->data['chapter'] = $this->MChapter->get('id', $id);

        $this->data['title'] = $this->MPage->getTitle($this->data['chapter']->page_id) . ' -> ' . $this->data['chapter']->name;
        //$this->data['mi'] = '';
        $this->data['innerJSs'][] = 'panel/VariableEditor/EditText.php';
        $this->data['innerJSs'][] = 'panel/VariableEditor/TinyMCEInit.php';
        $this->data['innerJSs'][] = 'panel/chapter/index.php';
        
        //$this->data['page'] = $name;
        $this->data['chapterID'] = $this->data['chapter']->id;
        $this->data['album_id'] = $this->data['chapter']->album_id;

        //$this->load->library('Chapter');
        //$this->data['chapter'] = new Chapter();

//        $this->load->library('EditText');
//        $vars = array(
//            'title' => 'Tytuł',
//            //'url' => 'chapter/modifyText',
//            'model' => 'MTexts',
//            'whatID' => 'name',
//            'id' => $this->data['chapter']->title_name,
//            'what' => 'pl',
//            'inputid' => $this->data['chapter']->title_name
//        );
//        $EditTextTitle = new EditText();
//        $EditTextTitle->setVars($vars);
//        $this->data['EditTextTitle'] = $EditTextTitle;
        
        $this->data['VEtabs'] = array();
        
        $textTitle = $this->MTexts->get('name',$this->data['chapter']->title_name);
                
        $this->load->library('EditMultiLangText');
        $vars = array(
            'title' => 'Tytuł',
            //'url' => 'chapter/modifyText',
            'values' => array(
                'pl' => $textTitle->pl,
                'en' => $textTitle->en),
            'model' => 'MTexts',
            'whatID' => 'name',
            'id' => $this->data['chapter']->title_name,
            'langs' => array('pl','en'),
            'inputid' => $this->data['chapter']->title_name,
            'useTinyMCE' => '', //empty basic advanced...
        );
        $EditTextTitle = new EditMultiLangText();
        $EditTextTitle->setVars($vars);
        $this->data['EditTextTitle'] = $EditTextTitle;
        
        $this->data['VEtabs'][] = $vars['inputid'].'_tabs';
        
        $vars['title'] = 'Treść';
        $vars['id'] = $this->data['chapter']->text_name;
        $vars['inputid'] = $this->data['chapter']->text_name;
                    
        $textText = $this->MTexts->get('name',$this->data['chapter']->text_name);
        $vars['values'] = array(
            'pl' => $textText->pl,
            'en' => $textText->en
        );
        $vars['useTinyMCE'] = 'advanced';
        
        $this->data['VEtabs'][] = $vars['inputid'].'_tabs';
        
        $EditTextText = new EditMultiLangText();
        $EditTextText->setVars($vars);
        $this->data['EditTextText'] = $EditTextText;
        
        
        $this->load->model('MAlbums', 'MAlbums', TRUE);
        $this->data['albums'] = $this->MAlbums->getAll();
        
        $this->load->library('calendar');
        
        $this->load->view('panel/header', $this->data);
        $this->load->view('panel/chapter/index', $this->data);
        $this->load->view('panel/footer');
    }

    function modify() {
        $this->MChapter->set($_POST['whatID'], $_POST['id'], $_POST['what'], $_POST['value']);
    }
    
    function modifyText() {
        $this->load->model('MTexts', 'MTexts', TRUE);
        $this->MTexts->set($_POST['whatID'], $_POST['id'], $_POST['what'], $_POST['value']);
        echo $_POST['whatID'].$_POST['id'].$_POST['what'].$_POST['value'];
    }
    
    function addAlbum(){
        
    }
    
    function removeAlbum(){
        
    }
    
    function setAlbum(){
        
    }
    
    function printAlbums($chapterID){
        $this->load->model('MAlbums', 'MAlbums', TRUE);
        
        $albums = $this->MAlbums->getAlbums($chapterID);
        //echo $albums;
        
        $albumsAll = $this->MAlbums->getAll();
                
        $albums['albums'] = $albumsAll;
        
        foreach ($albums as $album) {
            $this->load->view('panel/chapter/ajax/printAlbumAssoc',$album);
        }
    }
    
    private function std() {
        $this->data['innerJSs'] = array('panel/globalfunctions.php');
    }

    private $pageNames;
    private $pageTitles;
    private $jscripts;
    private $includeJSs;
    private $data;

}
