<?php

class MChapter extends MY_Model{

    function __construct() {
        parent::__construct();
        $this->TABLE = 'chapters';
    }
    
    function add($vals){
        if( !isset($vals['name']) ) { return 1; }
        
        $titleName = 'chapter_titleName_'.$vals['name'].'_';
        $vals['title_name'] = $titleName.$this->makeUniqueName($titleName);
        
        $textName = 'chapter_textName_'.$vals['name'].'_';
        $vals['text_name'] = $textName.$this->makeUniqueName($textName);
        
        $vals['sort'] = count($this->getAll('page_id', $vals['page_id'] ));
        
        parent::add($vals);
        
        $this->load->model('MTexts','MTexts',TRUE);
        $this->MTexts->add(array('name'=>$vals['title_name']));
        $this->MTexts->add(array('name'=>$vals['text_name']));
         
        return 0;
    }
    
    function remove($whatID,$id){
        $removedChapter = $this->get($whatID,$id);
        //$allOnPage = $this->getAll('page_id', $vals['page_id'] );
        
        $allOnPage = $this->db->get_where($this->TABLE,array('sort >'=>$removedChapter->sort,'page_id'=>$removedChapter->page_id))->result();

        foreach ($allOnPage as $chapter) {
            $this->set('id', $chapter->id, 'sort', $chapter->sort-1);
        }
        
        $this->load->model('MTexts','MTexts',TRUE);
        $this->MTexts->remove('name',$removedChapter->title_name);
        $this->MTexts->remove('name',$removedChapter->text_name);
        
        parent::remove($whatID, $id);
    }
    
    function getChapters($pageID){
        return $this->getAll('page_id', $pageID, 'sort', 'asc');
    }
    
    function sort($chapters){
        for ($i = 0; $i < count($chapters); $i++) {
            //$this->db->where('id', $chapters[$i]);
            //$this->db->update('photos', array('sort'=>$i) );
            $this->set('id',$chapters[$i],'sort',$i);
        }
    }
}    
